<?php

include "../config/database.php";


$date=$_GET['date'];

$employee=$_GET['employee'];



$sql="

SELECT

SUM(deliveries.slim_out + deliveries.round_out) AS gallons


FROM trips


JOIN deliveries

ON trips.trip_id=deliveries.trip_id



WHERE trips.trip_date='$date'


AND trips.driver_id='$employee'


";



$result=mysqli_query($conn,$sql);


$row=mysqli_fetch_assoc($result);



echo json_encode([

"gallons"=>$row['gallons'] ?? 0

]);


?>