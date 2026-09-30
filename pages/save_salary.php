<?php

include "../config/database.php";


$employee=$_POST['employee_id'];

$date=$_POST['salary_date'];

$type=$_POST['salary_type'];

$computed=$_POST['computed_amount'];

$amount=$_POST['amount'];

$notes=$_POST['notes'];



$sql="

INSERT INTO salary_records

(

employee_id,

salary_date,

salary_type,

computed_amount,

amount,

notes

)

VALUES

(

'$employee',

'$date',

'$type',

'$computed',

'$amount',

'$notes'

)

";



if(mysqli_query($conn,$sql)){


header("Location:salary_report.php");


}else{


echo mysqli_error($conn);


}


?>