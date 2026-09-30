<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"

SELECT

trips.trip_id,

trips.trip_date,

employees.employee_name,


trip_inventory.slim_loaded,

trip_inventory.round_loaded,


trip_inventory.slim_returned,

trip_inventory.round_returned


FROM trips


JOIN employees

ON trips.driver_id =
employees.employee_id


JOIN trip_inventory

ON trips.trip_id =
trip_inventory.trip_id


"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
🚚 Trip Reconciliation
</h2>


<table class="table table-bordered">


<tr>

<th>Date</th>

<th>Driver</th>

<th>Loaded</th>

<th>Returned</th>

<th>Difference</th>

</tr>


<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=$row['trip_date']?>

</td>


<td>

<?=$row['employee_name']?>

</td>


<td>

<?=

$row['slim_loaded']
+
$row['round_loaded']

?>

</td>


<td>

<?=

$row['slim_returned']
+
$row['round_returned']

?>

</td>


<td>

<?=

(
$row['slim_loaded']
+
$row['round_loaded']

)

-

(

$row['slim_returned']
+
$row['round_returned']

)

?>

</td>


</tr>


<?php } ?>


</table>


</div>


<?php include "../includes/footer.php"; ?>