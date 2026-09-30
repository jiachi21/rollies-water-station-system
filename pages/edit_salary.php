<?php

include "../config/database.php";


$id=$_GET['id'];


$result=mysqli_query(

$conn,

"

SELECT *

FROM salary_records

WHERE salary_id=$id

"

);


$salary=mysqli_fetch_assoc($result);



?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<h2 class="fw-bold">

Edit Salary

</h2>



<form action="update_salary.php" method="POST">



<input

type="hidden"

name="salary_id"

value="<?=$salary['salary_id']?>">



<label>

Salary Date

</label>


<input

type="date"

class="form-control"

name="salary_date"

value="<?=$salary['salary_date']?>"

required>


<br>




<label>

Salary Type

</label>


<select

class="form-control"

name="salary_type">



<option

<?=($salary['salary_type']=="Per Gallon")?"selected":""?>

>

Per Gallon

</option>



<option

<?=($salary['salary_type']=="Fixed")?"selected":""?>

>

Fixed

</option>



<option

<?=($salary['salary_type']=="Manual Adjustment")?"selected":""?>

>

Manual Adjustment

</option>



</select>


<br>




<label>

Amount

</label>


<input

type="number"

class="form-control"

name="amount"

value="<?=$salary['amount']?>"

required>



<br>




<label>

Notes

</label>


<textarea

class="form-control"

name="notes">


<?=$salary['notes']?>


</textarea>



<br>



<button

class="btn btn-primary">

Save Changes

</button>



<a

href="salary_report.php"

class="btn btn-secondary">

Cancel

</a>



</form>


</div>


</div>



<?php include "../includes/footer.php"; ?>