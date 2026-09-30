<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>Add Gallon</h2>


<form action="save_gallon.php"
method="POST">


Color:

<br>

<select name="color">

<option>Green</option>

<option>Blue</option>

</select>


<br><br>


Owner:

<br>

<select name="owner">

<option>Mother</option>

<option>Brother</option>

</select>


<br><br>


Status:

<br>

<select name="status">

<option>Available</option>

<option>With Customer</option>

<option>Damaged</option>

</select>


<br><br>


<button class="btn btn-success">

Save

</button>


</form>


</div>


<?php include "../includes/footer.php"; ?>