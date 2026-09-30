<?php

include "../config/database.php";


$customer_name = $_POST['customer_name'];
$contact_number = $_POST['contact_number'];
$customer_since = $_POST['customer_since'];
$status = $_POST['status'];
$notes = $_POST['notes'];


$sql = "INSERT INTO customers
(customer_name, contact_number, customer_since, status, notes)

VALUES

('$customer_name',
'$contact_number',
'$customer_since',
'$status',
'$notes')";


if(mysqli_query($conn, $sql)){

    echo "Customer saved successfully!";

    echo "<br>";

    echo "<a href='customers.php'>Back to Customers</a>";

}

else{

    echo "Error: " . mysqli_error($conn);

}


?>