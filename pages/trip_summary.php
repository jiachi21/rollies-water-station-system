<?php

include "../config/database.php";


$id=$_GET['id'];



$sql="

SELECT

trips.*,

employees.employee_name,


SUM(deliveries.slim_out + deliveries.round_out)

AS gallons,


SUM(deliveries.total_amount)

AS sales


FROM trips


JOIN employees

ON trips.driver_id = employees.employee_id


LEFT JOIN deliveries

ON trips.trip_id = deliveries.trip_id


WHERE trips.trip_id=$id


GROUP BY trips.trip_id

";


$result=mysqli_query($conn,$sql);

$trip=mysqli_fetch_assoc($result);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
Trip Summary
</h2>


<div class="card p-4">


<h4>

Driver:

<?php echo $trip['employee_name']; ?>

</h4>


<p>

Date:

<?php echo $trip['trip_date']; ?>

</p>


<p>

Gallons Delivered:

<?php echo $trip['gallons']; ?>

</p>


<p>

Sales:

₱<?php echo $trip['sales']; ?>

</p>


</div>


</div>


<?php include "../includes/footer.php"; ?>