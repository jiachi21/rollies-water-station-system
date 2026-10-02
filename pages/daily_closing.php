<?php

include "../config/database.php";

$date = $_GET['date'] ?? date('Y-m-d');

if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)){
    $date = date('Y-m-d');
}

$date = mysqli_real_escape_string($conn, $date);


// SALES

$sales = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT SUM(deliveries.total_amount) total
        FROM deliveries
        JOIN trips ON deliveries.trip_id = trips.trip_id
        WHERE trips.trip_date = '$date'
    ")
)['total'] ?? 0;


// COLLECTIONS BY METHOD

$cash = 0;
$gcash = 0;

$pay_result = mysqli_query($conn, "
    SELECT payment_method, SUM(amount) total
    FROM payments
    WHERE payment_date = '$date'
    GROUP BY payment_method
");

while($row = mysqli_fetch_assoc($pay_result)){
    if($row['payment_method'] == 'GCash'){
        $gcash += $row['total'];
    }else{
        $cash += $row['total'];
    }
}

$total_collected = $cash + $gcash;

$utang = $sales - $total_collected;


// EXPENSES (all categories from add_expense.php)

$expense_categories = [
    'Miryenda',
    'Repair',
    'Gas',
    'Plastic',
    'Glue Stick',
    'Dishwashing',
    'Sponge',
    'Water Test',
    'Internet',
    'Other'
];

$expenses = array_fill_keys($expense_categories, 0);

$expense_result = mysqli_query($conn, "
    SELECT category, SUM(amount) total
    FROM expenses
    WHERE expense_date = '$date'
    GROUP BY category
");

while($row = mysqli_fetch_assoc($expense_result)){
    $expenses[$row['category']] = ($expenses[$row['category']] ?? 0) + $row['total'];
}

$total_expenses = array_sum($expenses);


// SALARY

$total_salary = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT SUM(amount) total
        FROM salary_records
        WHERE salary_date = '$date'
    ")
)['total'] ?? 0;


// NET INCOME

$total_cost = $total_expenses + $total_salary;

$net_income = $sales - $total_cost;
$net_cash   = $total_collected - $total_cost;


// OWNERSHIP

$mother_sales = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT SUM(deliveries.total_amount) total
        FROM deliveries
        JOIN trips ON deliveries.trip_id = trips.trip_id
        WHERE trips.trip_date = '$date'
        AND deliveries.ownership = 'Mother'
    ")
)['total'] ?? 0;

$brother_sales = $sales - $mother_sales;

$mother_profit = 0;
$brother_profit = 0;

if($sales > 0){
    $mother_profit  = ($mother_sales / $sales) * $net_income;
    $brother_profit = ($brother_sales / $sales) * $net_income;
}


// OPERATIONS

$gallons = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT SUM(slim_out + round_out) total
        FROM deliveries
        JOIN trips ON deliveries.trip_id = trips.trip_id
        WHERE trips.trip_date = '$date'
    ")
)['total'] ?? 0;

$trips = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT COUNT(*) total
        FROM trips
        WHERE trip_date = '$date'
    ")
)['total'] ?? 0;

$customers = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT COUNT(DISTINCT deliveries.customer_id) total
        FROM deliveries
        JOIN trips ON deliveries.trip_id = trips.trip_id
        WHERE trips.trip_date = '$date'
    ")
)['total'] ?? 0;

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">

<h2 class="fw-bold">Daily Closing Report</h2>

<p class="text-muted">Daily income statement</p>


<div class="card shadow-sm p-4 mb-4">

<form method="GET">

<label>Report Date</label>

<input type="date" class="form-control" name="date" value="<?=$date?>">

<br>

<button class="btn btn-primary">Generate Report</button>

</form>

</div>


<div class="card shadow-sm p-4 mb-4">

<h3>Income Statement</h3>

<hr>

<h5>Revenue</h5>

<div class="d-flex justify-content-between">
<span>Sales Revenue</span>
<strong>₱<?=number_format($sales,2)?></strong>
</div>

<hr>

<h5>Collections</h5>

<div class="d-flex justify-content-between">
<span>Cash</span>
<strong>₱<?=number_format($cash,2)?></strong>
</div>

<div class="d-flex justify-content-between">
<span>GCash</span>
<strong>₱<?=number_format($gcash,2)?></strong>
</div>

<div class="d-flex justify-content-between">
<span>Total Collected</span>
<strong>₱<?=number_format($total_collected,2)?></strong>
</div>

<div class="d-flex justify-content-between">
<span>Accounts Receivable (Utang)</span>
<strong>₱<?=number_format($utang,2)?></strong>
</div>

<hr>

<h5>Expenses</h5>

<?php foreach($expenses as $category => $amount){ ?>

<div class="d-flex justify-content-between">
<span><?=htmlspecialchars($category)?></span>
<strong>₱<?=number_format($amount,2)?></strong>
</div>

<?php } ?>

<div class="d-flex justify-content-between">
<span>Employee Salary</span>
<strong>₱<?=number_format($total_salary,2)?></strong>
</div>

<div class="d-flex justify-content-between border-top mt-2 pt-2">
<span>Total Expenses</span>
<strong>₱<?=number_format($total_cost,2)?></strong>
</div>

<hr>

<div class="d-flex justify-content-between">
<h4>Net Income</h4>
<h4>₱<?=number_format($net_income,2)?></h4>
</div>

<div class="d-flex justify-content-between text-muted">
<span>Net Cash (Collected − Expenses)</span>
<strong>₱<?=number_format($net_cash,2)?></strong>
</div>

</div>


<div class="card shadow-sm p-4 mb-4">

<h3>Ownership Profit Allocation</h3>

<hr>

<p>🟢 Mother Profit
<strong>₱<?=number_format($mother_profit,2)?></strong>
</p>

<p>🔵 Brother Profit
<strong>₱<?=number_format($brother_profit,2)?></strong>
</p>

</div>


<div class="card shadow-sm p-4">

<h3>Operations Summary</h3>

<hr>

<p>Date: <?=date("m/d/Y",strtotime($date))?></p>

<p>Trips Completed: <?=$trips?></p>

<p>Customers Served: <?=$customers?></p>

<p>Gallons Delivered: <?=$gallons?></p>

</div>

</div>


<?php include "../includes/footer.php"; ?>