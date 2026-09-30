<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"

SELECT *

FROM employees

ORDER BY status='Inactive', employee_name

"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between align-items-center mb-4">


<h2 class="fw-bold">

Employee Management

</h2>


<a href="add_employee.php"

class="btn btn-primary">

Add Employee

</a>


</div>




<div class="card shadow-sm p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>

<th>Name</th>

<th>Role</th>

<th>Salary Type</th>

<th>Rate</th>

<th>Hire Date</th>

<th>Status</th>

<th>Action</th>


</tr>


</thead>



<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


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

₱<?=number_format($row['salary_rate'],2)?>

</td>



<td>


<?=

$row['hire_date']

?

date("m/d/Y",strtotime($row['hire_date']))

:

'-'

?>


</td>



<td>

<?php if($row['status']=="Active"){ ?>

<span class="badge bg-success">

Active

</span>

<?php }else{ ?>

<span class="badge bg-secondary">

Inactive

</span>

<?php } ?>


</td>



<td>


<a

href="edit_employee.php?id=<?=$row['employee_id']?>"

class="btn btn-warning btn-sm">

Edit

</a>



</td>



</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>