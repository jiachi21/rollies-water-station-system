<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<h2 class="fw-bold">

Add Employee

</h2>



<form action="save_employee.php" method="POST">



<label>

Employee Name

</label>


<input

class="form-control"

name="employee_name"

required>


<br>



<label>

Role

</label>


<select

class="form-control"

name="role">


<option>

Driver

</option>


<option>

Helper

</option>


<option>

Refiller

</option>


<option>

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


<option value="Per Gallon">

Per Gallon

</option>


<option value="Fixed">

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

required>


<br>



<label>

Hire Date

</label>


<input

type="date"

class="form-control"

name="hire_date">


<br>



<button

class="btn btn-primary">

Save Employee

</button>



</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>