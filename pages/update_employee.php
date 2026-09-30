<?php

include "../config/database.php";


$id=$_POST['employee_id'];

$name=$_POST['employee_name'];

$role=$_POST['role'];

$type=$_POST['salary_type'];

$rate=$_POST['salary_rate'];

$hire=$_POST['hire_date'];

$end=$_POST['end_date'];

$status=$_POST['status'];



$sql="

UPDATE employees

SET


employee_name='$name',

role='$role',

salary_type='$type',

salary_rate='$rate',

hire_date='$hire',

end_date='$end',

status='$status'


WHERE employee_id='$id'


";



mysqli_query($conn,$sql);



header("Location:employees.php");


?>