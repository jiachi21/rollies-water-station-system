<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card p-4">


<h2>

Add Expense

</h2>



<form action="save_expense.php" method="POST">



<label>

Date

</label>


<input

type="date"

class="form-control"

name="expense_date"

required>



<br>




<label>

Category

</label>



<select

class="form-control"

name="category"

required>


<option value="Miryenda">

Miryenda

</option>


<option value="Repair">

Repair

</option>



<option value="Gas">

Gas

</option>



<option value="Plastic">

Plastic

</option>



<option value="Glue Stick">

Glue Stick

</option>



<option value="Dishwashing">

Dishwashing

</option>



<option value="Sponge">

Sponge

</option>



<option value="Water Test">

Water Test

</option>



<option value="Internet">

Internet

</option>



<option value="Other">

Other

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

required>



<br>




<label>

Description

</label>


<textarea

class="form-control"

name="description"

rows="3">

</textarea>



<br>




<button

class="btn btn-primary">

Save Expense

</button>



</form>



</div>


</div>



<?php include "../includes/footer.php"; ?>