<?php

include "../config/database.php";


$id = $_POST['customer_id'];

$name = $_POST['customer_name'];

$contact = $_POST['contact_number'];

$status = $_POST['status'];

$notes = $_POST['notes'];



$sql = "UPDATE customers SET

customer_name='$name',

contact_number='$contact',

status='$status',

notes='$notes'


WHERE customer_id=$id";



if(mysqli_query($conn,$sql)){


echo "Customer updated successfully!";

echo "<br>";

echo "<a href='customers.php'>Back</a>";


}

else{


echo "Error: " . mysqli_error($conn);


}



?>