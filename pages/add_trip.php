<?php

include "../config/database.php";


$drivers=mysqli_query(

$conn,

"

SELECT employee_id, employee_name

FROM employees

WHERE status='Active'

AND role='Driver'

ORDER BY employee_name

"

);



$helpers=mysqli_query(

$conn,

"

SELECT employee_id, employee_name, role

FROM employees

WHERE status='Active'

ORDER BY employee_name

"

);



$refillers=mysqli_query(

$conn,

"

SELECT employee_id, employee_name

FROM employees

WHERE status='Active'

AND role='Refiller'

ORDER BY employee_name

"

);



$cleaners=mysqli_query(

$conn,

"

SELECT employee_id, employee_name

FROM employees

WHERE status='Active'

AND role='Cleaner'

ORDER BY employee_name

"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<div class="mb-4">


<h2 class="fw-bold">

Create Delivery Trip

</h2>


<p class="text-muted">

Record the employees and inventory loaded before departure.

</p>


</div>




<form action="save_trip.php" method="POST">



<div class="mb-3">


<label class="form-label">

Trip Date

</label>


<input

type="date"

class="form-control"

name="trip_date"

required>


</div>




<div class="mb-3">


<label class="form-label">

Driver

</label>


<select

class="form-select"

name="driver_id"

required>


<option value="">

Select Driver

</option>


<?php while($row=mysqli_fetch_assoc($drivers)){ ?>


<option value="<?=$row['employee_id']?>">

<?=$row['employee_name']?>


</option>


<?php } ?>


</select>


</div>




<div class="mb-3">


<label class="form-label">

Helper

</label>


<select

class="form-select"

name="helper_id">


<option value="">

None

</option>


<?php while($row=mysqli_fetch_assoc($helpers)){ ?>


<option value="<?=$row['employee_id']?>">

<?=$row['employee_name']?>

(<?=$row['role']?>)

</option>


<?php } ?>


</select>


</div>




<div class="mb-3">


<label class="form-label">

Refiller

</label>


<select

class="form-select"

name="refiller_id">


<option value="">

None

</option>


<?php while($row=mysqli_fetch_assoc($refillers)){ ?>


<option value="<?=$row['employee_id']?>">

<?=$row['employee_name']?>


</option>


<?php } ?>


</select>


</div>




<div class="mb-3">


<label class="form-label">

Cleaner

</label>


<select

class="form-select"

name="cleaner_id">


<option value="">

None

</option>


<?php while($row=mysqli_fetch_assoc($cleaners)){ ?>


<option value="<?=$row['employee_id']?>">

<?=$row['employee_name']?>


</option>


<?php } ?>


</select>


</div>




<hr>


<h5 class="mb-3">

Trip Inventory

</h5>



<div class="row">


<div class="col-md-6">


<label class="form-label">

Slim Loaded

</label>


<input

type="number"

class="form-control"

name="slim_loaded"

value="0"

min="0"

required>


</div>



<div class="col-md-6">


<label class="form-label">

Round Loaded

</label>


<input

type="number"

class="form-control"

name="round_loaded"

value="0"

min="0"

required>


</div>


</div>




<div class="mt-3">


<label class="form-label">

Trip Notes

</label>


<textarea

class="form-control"

name="notes"

rows="4"></textarea>


</div>




<div class="mt-4">


<button

class="btn btn-primary">

Start Trip

</button>



<a

href="trips.php"

class="btn btn-secondary">

Cancel

</a>


</div>



</form>


</div>


</div>



<?php include "../includes/footer.php"; ?>