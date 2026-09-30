<?php

include "../config/database.php";


$id=$_GET['id'];


$result=mysqli_query(

$conn,

"

SELECT *

FROM employees

WHERE employee_id=$id

"

);


$employee=mysqli_fetch_assoc($result);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<h2 class="fw-bold">

Edit Employee

</h2>



<form action="update_employee.php" method="POST">



<input

type="hidden"

name="employee_id"

value="<?=$employee['employee_id']?>">



<label>

Employee Name

</label>


<input

class="form-control"

name="employee_name"

value="<?=$employee['employee_name']?>"

required>



<br>



<label>

Role

</label>


<select

class="form-control"

name="role">



<option

<?=($employee['role']=="Driver")?"selected":""?>

>

Driver

</option>



<option

<?=($employee['role']=="Helper")?"selected":""?>

>

Helper

</option>



<option

<?=($employee['role']=="Refiller")?"selected":""?>

>

Refiller

</option>



<option

<?=($employee['role']=="Cleaner")?"selected":""?>

>

Cleaner

</option>



</select>



<br>



<label>

Salary Type

</label>


<select

class="form-control"

name="salary_type">



<option

<?=($employee['salary_type']=="Per Gallon")?"selected":""?>

>

Per Gallon

</option>



<option

<?=($employee['salary_type']=="Fixed")?"selected":""?>

>

Fixed

</option>



</select>



<br>



<label>

Salary Rate

</label>


<input

type="number"

class="form-control"

name="salary_rate"

value="<?=$employee['salary_rate']?>"



>



<br>




<label>

Hire Date

</label>


<input

type="date"

class="form-control"

name="hire_date"

value="<?=$employee['hire_date']?>"

>



<br>




<label>

End Date

</label>


<input

type="date"

class="form-control"

name="end_date"

value="<?=$employee['end_date']?>"

>



<br>




<label>

Status

</label>


<select

class="form-control"

name="status">



<option

<?=($employee['status']=="Active")?"selected":""?>

>

Active

</option>



<option

<?=($employee['status']=="Inactive")?"selected":""?>

>

Inactive

</option>



</select>



<br>



<button

class="btn btn-primary">

Save Employee

</button>



<a

href="employees.php"

class="btn btn-secondary">

Cancel

</a>



</form>


</div>


</div>



<?php include "../includes/footer.php"; ?>