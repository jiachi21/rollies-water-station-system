<?php


include "../config/database.php";


$customer_id=$_POST['customer_id'];

$date=$_POST['payment_date'];

$amount=$_POST['amount'];

$method=$_POST['payment_method'];



$sql="

INSERT INTO payments

(
customer_id,
payment_date,
amount,
payment_method
)


VALUES

(
'$customer_id',
'$date',
'$amount',
'$method'
)

";



if(mysqli_query($conn,$sql)){


header("Location: payments.php");


}

else{


echo mysqli_error($conn);


}


?>