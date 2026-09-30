<?php

include "../config/database.php";


$id=$_GET['id'];


$result=mysqli_query(
$conn,

"
SELECT status

FROM customers

WHERE customer_id=$id

"

);


$row=mysqli_fetch_assoc($result);



if($row['status']=="Active"){

$new_status="Inactive";

}

else{

$new_status="Active";

}



mysqli_query(
$conn,

"

UPDATE customers

SET status='$new_status'

WHERE customer_id=$id

"

);



header("Location:customers.php");


?>