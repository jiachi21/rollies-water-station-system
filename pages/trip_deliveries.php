<?php

include "../config/database.php";


$id=(int)($_GET['id'] ?? 0);


if($id<=0){

die("Invalid trip.");

}



// TRIP

$trip=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT

t.*,

d.employee_name AS driver_name,

h.employee_name AS helper_name,

r.employee_name AS refiller_name,

c.employee_name AS cleaner_name


FROM trips t


JOIN employees d

ON t.driver_id=d.employee_id


LEFT JOIN employees h

ON t.helper_id=h.employee_id


LEFT JOIN employees r

ON t.refiller_id=r.employee_id


LEFT JOIN employees c

ON t.cleaner_id=c.employee_id


WHERE t.trip_id=$id

"

)

);



// INVENTORY

$inventory=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT *

FROM trip_inventory

WHERE trip_id=$id

LIMIT 1

"

)

);



$slim_loaded=(int)($inventory['slim_loaded'] ?? 0);

$round_loaded=(int)($inventory['round_loaded'] ?? 0);



// DELIVERIES

$result=mysqli_query(

$conn,

"

SELECT

deliveries.*,

customers.customer_name


FROM deliveries


JOIN customers

ON deliveries.customer_id=customers.customer_id


WHERE deliveries.trip_id=$id


ORDER BY deliveries.delivery_id ASC

"

);



$rows=[];

$slim_total=0;

$round_total=0;

$total_sales=0;



while($row=mysqli_fetch_assoc($result)){


$rows[]=$row;


$slim_total+=(int)$row['slim_out'];

$round_total+=(int)$row['round_out'];

$total_sales+=(float)$row['total_amount'];


}



$remaining_slim=$slim_loaded-$slim_total;

$remaining_round=$round_loaded-$round_total;



?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">



<div class="d-flex justify-content-between align-items-center mb-4">


<div>


<h2 class="fw-bold">

Trip Delivery Summary

</h2>


<p class="text-muted mb-0">

Trip #<?=$trip['trip_id']?> ·

<?=date("m/d/Y",strtotime($trip['trip_date']))?>

</p>


</div>



<a

href="add_delivery.php?trip_id=<?=$id?>"

class="btn btn-primary">

Add Delivery

</a>


</div>




<div class="card shadow-sm p-4 mb-4">


<h5>

Trip Information

</h5>


<hr>


<div class="row">


<div class="col-md-3">


<strong>Date</strong>


<div>

<?=date("m/d/Y",strtotime($trip['trip_date']))?>

</div>


</div>



<div class="col-md-3">


<strong>Driver</strong>


<div>

<?=$trip['driver_name']?>


</div>


</div>



<div class="col-md-3">


<strong>Helper</strong>


<div>

<?=$trip['helper_name'] ?: '-'?>

</div>


</div>



<div class="col-md-3">


<strong>Refiller / Cleaner</strong>


<div>

<?=$trip['refiller_name'] ?: '-'?>

/

<?=$trip['cleaner_name'] ?: '-'?>

</div>


</div>


</div>


</div>





<div class="row g-4 mb-4">


<div class="col-md-3">


<div class="card shadow-sm p-4 h-100">


<small class="text-muted">

Slim Loaded

</small>


<h3>

<?=$slim_loaded?>

</h3>


</div>


</div>



<div class="col-md-3">


<div class="card shadow-sm p-4 h-100">


<small class="text-muted">

Round Loaded

</small>


<h3>

<?=$round_loaded?>

</h3>


</div>


</div>



<div class="col-md-3">


<div class="card shadow-sm p-4 h-100">


<small class="text-muted">

Slim Delivered

</small>


<h3>

<?=$slim_total?>

</h3>


</div>


</div>



<div class="col-md-3">


<div class="card shadow-sm p-4 h-100">


<small class="text-muted">

Round Delivered

</small>


<h3>

<?=$round_total?>

</h3>


</div>


</div>


</div>





<div class="card shadow-sm p-4 mb-4">


<div class="row">


<div class="col-md-4">


<strong>

Slim Remaining

</strong>


<div class="fs-4

<?=($remaining_slim<0?'text-danger':'')?>

">


<?=$remaining_slim?>

</div>


</div>



<div class="col-md-4">


<strong>

Round Remaining

</strong>


<div class="fs-4

<?=($remaining_round<0?'text-danger':'')?>

">


<?=$remaining_round?>

</div>


</div>



<div class="col-md-4">


<strong>

Trip Sales

</strong>


<div class="fs-4">

₱<?=number_format($total_sales,2)?>

</div>


</div>


</div>


</div>





<div class="card shadow-sm p-4">


<div class="d-flex justify-content-between align-items-center mb-3">


<h5 class="mb-0">

Customer Deliveries

</h5>


<span class="text-muted">

<?=count($rows)?> deliveries

</span>


</div>



<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>


<th>Customer</th>

<th>Slim</th>

<th>Round</th>

<th>Slim Returned</th>

<th>Round Returned</th>

<th>Amount</th>

<th>Owner</th>


</tr>


</thead>



<tbody>



<?php foreach($rows as $row){ ?>


<tr>


<td>

<?=$row['customer_name']?>

</td>


<td>

<?=$row['slim_out']?>

</td>


<td>

<?=$row['round_out']?>

</td>


<td>

<?=$row['slim_return']?>

</td>


<td>

<?=$row['round_return']?>

</td>


<td>

₱<?=number_format($row['total_amount'],2)?>

</td>


<td>


<?php if($row['ownership']=="Mother"){ ?>


<span class="badge bg-success">

🟢 Mother

</span>


<?php }else{ ?>


<span class="badge bg-primary">

🔵 Brother

</span>


<?php } ?>


</td>


</tr>


<?php } ?>



<?php if(count($rows)==0){ ?>


<tr>


<td colspan="6"

class="text-center text-muted py-4">

No deliveries recorded yet.

</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>




<div class="mt-3">


<a

href="trips.php"

class="btn btn-secondary">

Back to Trips

</a>


</div>



</div>


<?php include "../includes/footer.php"; ?>