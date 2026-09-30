<?php

include "../config/database.php";


$sql = "

SELECT

t.trip_id,

t.trip_date,

d.employee_name AS driver_name,

h.employee_name AS helper_name,

r.employee_name AS refiller_name,

c.employee_name AS cleaner_name,

ti.slim_loaded,

ti.round_loaded,

(

SELECT COUNT(*)

FROM deliveries

WHERE deliveries.trip_id=t.trip_id

) AS delivery_count


FROM trips t


JOIN employees d

ON t.driver_id=d.employee_id


LEFT JOIN employees h

ON t.helper_id=h.employee_id


LEFT JOIN employees r

ON t.refiller_id=r.employee_id


LEFT JOIN employees c

ON t.cleaner_id=c.employee_id


LEFT JOIN trip_inventory ti

ON t.trip_id=ti.trip_id


ORDER BY

t.trip_date DESC,

t.trip_id DESC

";


$result=mysqli_query($conn,$sql);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between align-items-center mb-4">


<div>


<h2 class="fw-bold">

Delivery Trips

</h2>


<p class="text-muted mb-0">

Manage delivery trips and daily vehicle inventory

</p>


</div>



<a

href="add_trip.php"

class="btn btn-primary">

Create New Trip

</a>


</div>




<div class="card shadow-sm p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>ID</th>

<th>Date</th>

<th>Driver</th>

<th>Helper</th>

<th>Refiller</th>

<th>Cleaner</th>

<th>Loaded</th>

<th>Deliveries</th>

<th>Action</th>

</tr>


</thead>



<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=$row['trip_id']?>

</td>



<td>

<?=date(

"m/d/Y",

strtotime($row['trip_date'])

)?>

</td>



<td>

<?=$row['driver_name']?>

</td>



<td>

<?=$row['helper_name'] ?: '-'?>

</td>



<td>

<?=$row['refiller_name'] ?: '-'?>

</td>



<td>

<?=$row['cleaner_name'] ?: '-'?>

</td>



<td>

<?=$row['slim_loaded'] ?? 0?>

Slim /

<?=$row['round_loaded'] ?? 0?>

Round

</td>



<td>

<?=$row['delivery_count']?>

</td>



<td>


<a

href="trip_deliveries.php?id=<?=$row['trip_id']?>"

class="btn btn-success btn-sm">

View Trip

</a>


</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


</div>



<?php include "../includes/footer.php"; ?>