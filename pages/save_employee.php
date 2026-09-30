<?php

include "../config/database.php";


$name=$_POST['employee_name'];

$role=$_POST['role'];

$type=$_POST['salary_type'];

$rate=$_POST['salary_rate'];

$hire=$_POST['hire_date'];



$sql="

INSERT INTO employees

(

employee_name,

role,

salary_type,

salary_rate,

hire_date,

status

)


VALUES

(

'$name',

'$role',

'$type',

'$rate',

'$hire',

'Active'

)

";



if(mysqli_query($conn,$sql)){


header("Location:employees.php");


}else{


echo mysqli_error($conn);


}



?>