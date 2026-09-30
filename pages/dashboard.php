<?php

include "../config/database.php";
include "../includes/header.php";
include "../includes/sidebar.php";


// SALES

$sales = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT SUM(total_amount) AS total
FROM deliveries
WHERE DATE(created_at)=CURDATE()
")
)['total'] ?? 0;



// CASH

$payments = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT SUM(amount) AS total
FROM payments
WHERE DATE(payment_date)=CURDATE()
")
)['total'] ?? 0;



// EXPENSES

$expenses = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT SUM(amount) AS total
FROM expenses
WHERE DATE(expense_date)=CURDATE()
")
)['total'] ?? 0;



// GALLONS

$gallons = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT SUM(slim_out + round_out) AS total
FROM deliveries
WHERE DATE(created_at)=CURDATE()
")
)['total'] ?? 0;



// CUSTOMERS

$customers = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM customers
WHERE status='Active'
")
)['total'] ?? 0;



// TRIPS

$trips = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM trips
WHERE trip_date=CURDATE()
")
)['total'] ?? 0;



// UTANG

$utang = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT 

SUM(deliveries.total_amount)

-
IFNULL(
(
SELECT SUM(amount)
FROM payments
),
0)

AS total

FROM deliveries

")
)['total'] ?? 0;



// OWNERSHIP

$motherGallons = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM gallon_inventory
WHERE owner='Mother'
")
)['total'] ?? 0;



$brotherGallons = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM gallon_inventory
WHERE owner='Brother'
")
)['total'] ?? 0;



$net=$payments-$expenses;


?>


<div class="content">


<div class="mb-4">


<p class="text-muted">

Management Information System Dashboard

</p>


</div>



<div class="row g-4">


<?php

$cards=[

["Today's Sales",$sales,true],

["Cash Collected",$payments,true],

["Outstanding Balance",$utang,true],

["Expenses",$expenses,true],

["Net Cash",$net,true],

["Gallons Delivered",$gallons,false],

["Active Customers",$customers,false],

["Today's Trips",$trips,false]

];


foreach($cards as $card){

?>


<div class="col-md-3">


<div class="card p-4 h-100 shadow-sm">


<h6 class="text-muted">

<?=$card[0]?>

</h6>


<h3 class="fw-bold">

<?php

if($card[2]){

echo "₱".number_format($card[1],2);

}

else{

echo $card[1];

}

?>

</h3>


</div>


</div>


<?php } ?>


</div>





<div class="row mt-5">


<div class="col-md-6 mb-4">


<div class="card p-4 h-100 shadow-sm">


<h4>

Financial Overview

</h4>


<div style="height:300px">

<canvas id="financeChart"></canvas>

</div>


</div>


</div>





<div class="col-md-6 mb-4">


<div class="card p-4 h-100 shadow-sm">


<h4>

🟢🔵 Gallon Ownership

</h4>


<div style="height:300px">

<canvas id="gallonChart"></canvas>

</div>


</div>


</div>


</div>





<div class="card p-4 shadow-sm">


<h4>

Quick Actions

</h4>


<a href="daily_closing.php"

class="btn btn-primary">

Open Daily Closing Report

</a>


</div>



</div>





<script>


new Chart(

document.getElementById('financeChart'),

{

type:'bar',

data:{

labels:[

'Sales',

'Cash',

'Expenses'

],

datasets:[{

label:'Amount',

data:[

<?=$sales?>,

<?=$payments?>,

<?=$expenses?>

]

}]

},

options:{

responsive:true,

maintainAspectRatio:false

}

}

);





new Chart(

document.getElementById('gallonChart'),

{

type:'doughnut',

data:{

labels:[

'Mother',

'Brother'

],

datasets:[{

data:[

<?=$motherGallons?>,

<?=$brotherGallons?>

]

}]

},

options:{

responsive:true,

maintainAspectRatio:false

}

}

);


</script>



<?php include "../includes/footer.php"; ?>