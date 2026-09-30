<?php

include "../config/database.php";


$date=$_POST['expense_date'];

$category=$_POST['category'];

$amount=$_POST['amount'];

$description=$_POST['description'];



$sql="

INSERT INTO expenses

(
expense_date,
category,
amount,
description
)


VALUES

(
'$date',
'$category',
'$amount',
'$description'
)

";



if(mysqli_query($conn,$sql)){


header("Location: expenses.php");


}

else{


echo mysqli_error($conn);


}


?>