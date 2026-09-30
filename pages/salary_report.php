<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"

SELECT

salary_records.*,

employees.employee_name,

employees.role


FROM salary_records


JOIN employees

ON salary_records.employee_id=employees.employee_id


ORDER BY salary_date DESC


"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-4">


<div>


<h2 class="fw-bold">

Salary Records

</h2>


<p class="text-muted">

Manage employee salary history

</p>


</div>



<a href="add_salary.php"

class="btn btn-primary">

Add Salary

</a>


</div>





<div class="card shadow-sm p-4">


<table class="table table-hover">


<thead class="table-light">


<tr>


<th>Date</th>

<th>Employee</th>

<th>Role</th>

<th>Type</th>

<th>Amount</th>

<th>Action</th>


</tr>


</thead>



<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=date("m/d/Y",strtotime($row['salary_date']))?>

</td>


<td>

<?=$row['employee_name']?>

</td>


<td>

<?=$row['role']?>

</td>


<td>

<?=$row['salary_type']?>

</td>


<td>

<div>

Computed:

₱<?=number_format($row['computed_amount'],2)?>

</div>


<strong>

Final:

₱<?=number_format($row['amount'],2)?>

</strong>
</td>


<td>


<a

href="edit_salary.php?id=<?=$row['salary_id']?>"

class="btn btn-warning btn-sm">

Edit

</a>


<a

href="delete_salary.php?id=<?=$row['salary_id']?>"

class="btn btn-danger btn-sm">

Delete

</a>


</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


<?php include "../includes/footer.php"; ?>