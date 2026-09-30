<?php

include "../config/database.php";


$customer_id=$_POST['customer_id'];

$address=$_POST['address'];

$latitude=$_POST['latitude'];

$longitude=$_POST['longitude'];



$sql="

INSERT INTO customer_locations

(

customer_id,

address,

latitude,

longitude

)

VALUES

(

'$customer_id',

'$address',

'$latitude',

'$longitude'

)

";



mysqli_query($conn,$sql);



header("Location:view_customer.php?id=".$customer_id);

?>