<?php

include "../config/database.php";


$id=$_POST['salary_id'];

$date=$_POST['salary_date'];

$type=$_POST['salary_type'];

$amount=$_POST['amount'];

$notes=$_POST['notes'];



$sql="

UPDATE salary_records

SET

salary_date='$date',

salary_type='$type',

amount='$amount',

notes='$notes'


WHERE salary_id='$id'

";



mysqli_query($conn,$sql);



header("Location:salary_report.php");


?>