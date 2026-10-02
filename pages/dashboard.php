<?php

date_default_timezone_set('Asia/Manila');

include "../config/database.php";


// ---------- HELPERS ----------

function rows($conn, $sql){
    $res = mysqli_query($conn, $sql);
    return $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
}

function one($conn, $sql, $field = 'total'){
    $res = mysqli_query($conn, $sql);
    if(!$res) return 0;
    $r = mysqli_fetch_assoc($res);
    return $r[$field] ?? 0;
}

function peso($n){
    return "₱" . number_format((float)$n, 2);
}

function validDate($d){
    return preg_match('/^\d{4}-\d{2}-\d{2}$/', $d) && strtotime($d) !== false;
}


// ---------- PERIOD ----------

$today = date('Y-m-d');
$range = $_GET['range'] ?? 'month';

switch($range){

    case 'today':
        $from = $to = $today;
        $label = "Today";
        break;

    case 'week':
        $from = date('Y-m-d', strtotime('monday this week'));
        $to   = $today;
        $label = "This Week";
        break;

    case 'last_month':
        $from = date('Y-m-01', strtotime('first day of last month'));
        $to   = date('Y-m-t', strtotime('last day of last month'));
        $label = "Last Month";
        break;

    case 'all':
        $min  = one($conn, "SELECT MIN(trip_date) total FROM trips");
        $from = $min ?: $today;
        $to   = $today;
        $label = "All Time";
        break;

    case 'custom':
        $from = $_GET['from'] ?? $today;
        $to   = $_GET['to'] ?? $today;
        if(!validDate($from)) $from = $today;
        if(!validDate($to))   $to   = $today;
        $label = "Custom";
        break;

    default:
        $range = 'month';
        $from = date('Y-m-01');
        $to   = $today;
        $label = "This Month";
}

if($from > $to){
    [$from, $to] = [$to, $from];
}

// keep charts readable: max 366 days
if((strtotime($to) - strtotime($from)) / 86400 > 366){
    $from = date('Y-m-d', strtotime($to . ' -365 days'));
}

$from = mysqli_real_escape_string($conn, $from);
$to   = mysqli_real_escape_string($conn, $to);

$period_text = date("M j, Y", strtotime($from));
if($from != $to){
    $period_text .= " – " . date("M j, Y", strtotime($to));
}


// ---------- SALES / OPERATIONS (by trip_date) ----------

$ops = rows($conn, "
    SELECT
        IFNULL(SUM(d.total_amount),0) sales,
        IFNULL(SUM(d.slim_out + d.round_out),0) gallons,
        COUNT(DISTINCT d.customer_id) customers
    FROM deliveries d
    JOIN trips t ON d.trip_id = t.trip_id
    WHERE t.trip_date BETWEEN '$from' AND '$to'
")[0] ?? ['sales'=>0,'gallons'=>0,'customers'=>0];

$sales     = (float)$ops['sales'];
$gallons   = (int)$ops['gallons'];
$served    = (int)$ops['customers'];

$trips = (int)one($conn, "
    SELECT COUNT(*) total FROM trips
    WHERE trip_date BETWEEN '$from' AND '$to'
");


// ---------- COLLECTIONS ----------

$cash = 0;
$gcash = 0;

foreach(rows($conn, "
    SELECT payment_method, SUM(amount) total
    FROM payments
    WHERE payment_date BETWEEN '$from' AND '$to'
    GROUP BY payment_method
") as $r){
    if($r['payment_method'] == 'GCash') $gcash += $r['total'];
    else $cash += $r['total'];
}

$collected = $cash + $gcash;


// ---------- EXPENSES + SALARY ----------

$expense_by_cat = rows($conn, "
    SELECT category, SUM(amount) total
    FROM expenses
    WHERE expense_date BETWEEN '$from' AND '$to'
    GROUP BY category
    ORDER BY total DESC
");

$total_expenses = array_sum(array_column($expense_by_cat, 'total'));

$total_salary = (float)one($conn, "
    SELECT SUM(amount) total
    FROM salary_records
    WHERE salary_date BETWEEN '$from' AND '$to'
");

$total_cost = $total_expenses + $total_salary;

$net_income = $sales - $total_cost;
$net_cash   = $collected - $total_cost;
$margin     = $sales > 0 ? ($net_income / $sales) * 100 : 0;


// ---------- ALL-TIME (not period-bound) ----------

$utang = (float)one($conn, "
    SELECT
        IFNULL((SELECT SUM(total_amount) FROM deliveries),0)
        -
        IFNULL((SELECT SUM(amount) FROM payments),0)
    AS total
");

$active_customers = (int)one($conn, "
    SELECT COUNT(*) total FROM customers WHERE status='Active'
");


// ---------- OWNERSHIP SPLIT ----------

$mother_sales = (float)one($conn, "
    SELECT SUM(d.total_amount) total
    FROM deliveries d
    JOIN trips t ON d.trip_id = t.trip_id
    WHERE t.trip_date BETWEEN '$from' AND '$to'
    AND d.ownership = 'Mother'
");

$brother_sales = $sales - $mother_sales;

$mother_profit  = $sales > 0 ? ($mother_sales  / $sales) * $net_income : 0;
$brother_profit = $sales > 0 ? ($brother_sales / $sales) * $net_income : 0;


// ---------- DAILY TREND ----------

$sales_by_day = [];
foreach(rows($conn, "
    SELECT t.trip_date d, SUM(dl.total_amount) total
    FROM deliveries dl
    JOIN trips t ON dl.trip_id = t.trip_id
    WHERE t.trip_date BETWEEN '$from' AND '$to'
    GROUP BY t.trip_date
") as $r){ $sales_by_day[$r['d']] = (float)$r['total']; }

$paid_by_day = [];
foreach(rows($conn, "
    SELECT payment_date d, SUM(amount) total
    FROM payments
    WHERE payment_date BETWEEN '$from' AND '$to'
    GROUP BY payment_date
") as $r){ $paid_by_day[$r['d']] = (float)$r['total']; }

$cost_by_day = [];
foreach(rows($conn, "
    SELECT expense_date d, SUM(amount) total
    FROM expenses
    WHERE expense_date BETWEEN '$from' AND '$to'
    GROUP BY expense_date
") as $r){ $cost_by_day[$r['d']] = (float)$r['total']; }

foreach(rows($conn, "
    SELECT salary_date d, SUM(amount) total
    FROM salary_records
    WHERE salary_date BETWEEN '$from' AND '$to'
    GROUP BY salary_date
") as $r){ $cost_by_day[$r['d']] = ($cost_by_day[$r['d']] ?? 0) + (float)$r['total']; }

$labels = [];
$series_sales = [];
$series_paid = [];
$series_cost = [];

for($t = strtotime($from); $t <= strtotime($to); $t += 86400){
    $d = date('Y-m-d', $t);
    $labels[]       = date('M j', $t);
    $series_sales[] = $sales_by_day[$d] ?? 0;
    $series_paid[]  = $paid_by_day[$d] ?? 0;
    $series_cost[]  = $cost_by_day[$d] ?? 0;
}


// ---------- COST BREAKDOWN FOR DOUGHNUT ----------

$cost_labels = array_column($expense_by_cat, 'category');
$cost_values = array_map('floatval', array_column($expense_by_cat, 'total'));

if($total_salary > 0){
    $cost_labels[] = 'Salary';
    $cost_values[] = $total_salary;
}


// ---------- TOP LISTS ----------

$top_customers = rows($conn, "
    SELECT c.customer_name,
           SUM(d.total_amount) sales,
           SUM(d.slim_out + d.round_out) gallons
    FROM deliveries d
    JOIN trips t ON d.trip_id = t.trip_id
    JOIN customers c ON d.customer_id = c.customer_id
    WHERE t.trip_date BETWEEN '$from' AND '$to'
    GROUP BY c.customer_id
    ORDER BY sales DESC
    LIMIT 5
");

$top_debtors = rows($conn, "
    SELECT c.customer_name,
        (SELECT IFNULL(SUM(total_amount),0) FROM deliveries WHERE customer_id = c.customer_id)
        -
        (SELECT IFNULL(SUM(amount),0) FROM payments WHERE customer_id = c.customer_id)
        AS bal
    FROM customers c
    HAVING bal > 0
    ORDER BY bal DESC
    LIMIT 5
");

$recent_trips = rows($conn, "
    SELECT t.trip_id, t.trip_date, e.employee_name,
        (SELECT IFNULL(SUM(slim_out + round_out),0) FROM deliveries WHERE trip_id = t.trip_id) gallons,
        (SELECT IFNULL(SUM(total_amount),0) FROM deliveries WHERE trip_id = t.trip_id) sales
    FROM trips t
    JOIN employees e ON t.driver_id = e.employee_id
    WHERE t.trip_date BETWEEN '$from' AND '$to'
    ORDER BY t.trip_date DESC, t.trip_id DESC
    LIMIT 5
");


// ---------- KPI CARD DEFINITIONS ----------

$kpis = [
    ["Sales",          peso($sales),      "Billed, incl. utang",                      "text-primary"],
    ["Collected",      peso($collected),  "Cash " . peso($cash) . " · GCash " . peso($gcash), "text-success"],
    ["Expenses",       peso($total_cost), "Supplies " . peso($total_expenses) . " · Salary " . peso($total_salary), "text-danger"],
    ["Net Income",     peso($net_income), number_format($margin,1) . "% margin",       $net_income < 0 ? "text-danger" : "text-success"],
    ["Net Cash",       peso($net_cash),   "Collected − expenses",                      $net_cash < 0 ? "text-danger" : "text-success"],
    ["Gallons",        number_format($gallons), $trips . " trip(s) · " . $served . " customer(s)", ""],
    ["Outstanding Utang", peso($utang),   "All-time, unpaid balance",                  $utang > 0 ? "text-warning" : ""],
    ["Active Customers", number_format($active_customers), "Total on the books",       ""],
];

$presets = [
    'today'      => 'Today',
    'week'       => 'This Week',
    'month'      => 'This Month',
    'last_month' => 'Last Month',
    'all'        => 'All Time',
];

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex flex-wrap justify-content-between align-items-end mb-4 gap-3">

    <div>
        <h2 class="fw-bold mb-0">Dashboard</h2>
        <p class="text-muted mb-0">
            <?=$label?> · <?=$period_text?>
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2 align-items-center">

        <div class="btn-group btn-group-sm">
            <?php foreach($presets as $key => $text){ ?>
                <a href="?range=<?=$key?>"
                   class="btn <?=($range == $key) ? 'btn-primary' : 'btn-outline-primary'?>">
                    <?=$text?>
                </a>
            <?php } ?>
        </div>

        <form method="GET" class="d-flex gap-2 align-items-center">
            <input type="hidden" name="range" value="custom">
            <input type="date" name="from" value="<?=$from?>" class="form-control form-control-sm">
            <span class="text-muted">to</span>
            <input type="date" name="to" value="<?=$to?>" class="form-control form-control-sm">
            <button class="btn btn-sm <?=($range == 'custom') ? 'btn-primary' : 'btn-outline-primary'?>">Go</button>
        </form>

    </div>

</div>


<!-- KPI CARDS -->

<div class="row g-3 mb-4">

<?php foreach($kpis as $k){ ?>

    <div class="col-6 col-xl-3">
        <div class="card shadow-sm p-3 h-100">
            <small class="text-muted text-uppercase fw-semibold"><?=$k[0]?></small>
            <h3 class="fw-bold mb-1 <?=$k[3]?>"><?=$k[1]?></h3>
            <small class="text-muted"><?=$k[2]?></small>
        </div>
    </div>

<?php } ?>

</div>


<!-- CHARTS -->

<div class="row g-3 mb-4">

    <div class="col-lg-8">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-bold">Daily Trend</h5>
            <div style="height:320px">
                <canvas id="trendChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-bold">Where the Money Goes</h5>
            <div style="height:320px">
                <?php if(count($cost_values) > 0){ ?>
                    <canvas id="costChart"></canvas>
                <?php }else{ ?>
                    <div class="text-muted text-center pt-5">No expenses in this period.</div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>


<div class="row g-3 mb-4">

    <div class="col-lg-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-bold">Ownership Split</h5>
            <p class="text-muted small mb-2">Sales and profit share, by customer ownership</p>
            <div style="height:200px">
                <?php if($sales > 0){ ?>
                    <canvas id="ownerChart"></canvas>
                <?php }else{ ?>
                    <div class="text-muted text-center pt-5">No sales in this period.</div>
                <?php } ?>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span>🟢 Mother</span>
                <strong><?=peso($mother_profit)?></strong>
            </div>
            <div class="d-flex justify-content-between">
                <span>🔵 Brother</span>
                <strong><?=peso($brother_profit)?></strong>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-bold">Top Customers</h5>
            <p class="text-muted small">By sales in this period</p>
            <table class="table table-sm align-middle mb-0">
                <?php foreach($top_customers as $c){ ?>
                    <tr>
                        <td><?=htmlspecialchars($c['customer_name'])?></td>
                        <td class="text-muted"><?=(int)$c['gallons']?> gal</td>
                        <td class="text-end fw-semibold"><?=peso($c['sales'])?></td>
                    </tr>
                <?php } ?>
                <?php if(!$top_customers){ ?>
                    <tr><td class="text-muted text-center">No deliveries yet.</td></tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="fw-bold">Highest Utang</h5>
                    <p class="text-muted small">All-time unpaid balances</p>
                </div>
                <a href="customer_balances.php" class="btn btn-sm btn-outline-secondary">All</a>
            </div>
            <table class="table table-sm align-middle mb-0">
                <?php foreach($top_debtors as $c){ ?>
                    <tr>
                        <td><?=htmlspecialchars($c['customer_name'])?></td>
                        <td class="text-end">
                            <span class="badge bg-danger"><?=peso($c['bal'])?></span>
                        </td>
                    </tr>
                <?php } ?>
                <?php if(!$top_debtors){ ?>
                    <tr><td class="text-muted text-center">Nobody owes anything 🎉</td></tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>


<!-- RECENT TRIPS + QUICK ACTIONS -->

<div class="row g-3">

    <div class="col-lg-8">
        <div class="card shadow-sm p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="fw-bold mb-0">Recent Trips</h5>
                <a href="trips.php" class="btn btn-sm btn-outline-secondary">All trips</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Driver</th>
                            <th>Gallons</th>
                            <th>Sales</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($recent_trips as $t){ ?>
                        <tr>
                            <td><?=date("m/d/Y", strtotime($t['trip_date']))?></td>
                            <td><?=htmlspecialchars($t['employee_name'])?></td>
                            <td><?=(int)$t['gallons']?></td>
                            <td><?=peso($t['sales'])?></td>
                            <td class="text-end">
                                <a href="trip_deliveries.php?id=<?=$t['trip_id']?>" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if(!$recent_trips){ ?>
                        <tr><td colspan="5" class="text-center text-muted py-3">No trips in this period.</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm p-4 h-100">
            <h5 class="fw-bold">Quick Actions</h5>
            <div class="d-grid gap-2">
                <a href="add_trip.php" class="btn btn-primary">🚚 New Trip</a>
                <a href="add_payment.php" class="btn btn-success">💰 Record Payment</a>
                <a href="add_expense.php" class="btn btn-outline-danger">📉 Add Expense</a>
                <a href="add_salary.php" class="btn btn-outline-secondary">👷 Add Salary</a>
                <a href="daily_closing.php?date=<?=$to?>" class="btn btn-outline-primary">📘 Daily Closing (<?=date("M j", strtotime($to))?>)</a>
            </div>
        </div>
    </div>

</div>


</div>


<script>

const peso = v => '₱' + Number(v).toLocaleString('en-PH', {minimumFractionDigits: 2, maximumFractionDigits: 2});

const palette = ['#2563eb','#16a34a','#f59e0b','#ef4444','#8b5cf6','#06b6d4','#ec4899','#84cc16','#f97316','#64748b','#14b8a6'];


new Chart(document.getElementById('trendChart'), {

    type: 'line',

    data: {

        labels: <?=json_encode($labels)?>,

        datasets: [
            {
                label: 'Sales',
                data: <?=json_encode($series_sales)?>,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,.12)',
                fill: true,
                tension: .3
            },
            {
                label: 'Collected',
                data: <?=json_encode($series_paid)?>,
                borderColor: '#16a34a',
                tension: .3
            },
            {
                label: 'Expenses + Salary',
                data: <?=json_encode($series_cost)?>,
                borderColor: '#ef4444',
                tension: .3
            }
        ]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
            legend: { position: 'bottom' },
            tooltip: { callbacks: { label: c => c.dataset.label + ': ' + peso(c.parsed.y) } }
        },
        scales: {
            y: { beginAtZero: true, ticks: { callback: v => '₱' + v } },
            x: { ticks: { maxTicksLimit: 12 } }
        }
    }

});


<?php if(count($cost_values) > 0){ ?>

new Chart(document.getElementById('costChart'), {

    type: 'doughnut',

    data: {
        labels: <?=json_encode($cost_labels)?>,
        datasets: [{
            data: <?=json_encode($cost_values)?>,
            backgroundColor: palette
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12 } },
            tooltip: { callbacks: { label: c => c.label + ': ' + peso(c.parsed) } }
        }
    }

});

<?php } ?>


<?php if($sales > 0){ ?>

new Chart(document.getElementById('ownerChart'), {

    type: 'doughnut',

    data: {
        labels: ['Mother', 'Brother'],
        datasets: [{
            data: <?=json_encode([(float)$mother_sales, (float)$brother_sales])?>,
            backgroundColor: ['#16a34a', '#2563eb']
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12 } },
            tooltip: { callbacks: { label: c => c.label + ': ' + peso(c.parsed) } }
        }
    }

});

<?php } ?>

</script>


<?php include "../includes/footer.php"; ?>