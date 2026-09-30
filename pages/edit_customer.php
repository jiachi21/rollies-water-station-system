<?php

include "../config/database.php";


$id=$_GET['id'];


$result=mysqli_query(

$conn,

"

SELECT *

FROM customers

WHERE customer_id=$id

"

);


$customer=mysqli_fetch_assoc($result);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">



<div class="mb-4">


<h2 class="fw-bold">

Edit Customer

</h2>


<p class="text-muted">

Update customer information

</p>


</div>




<form action="update_customer.php" method="POST">



<input

type="hidden"

name="customer_id"

value="<?=$customer['customer_id']?>">



<div class="mb-3">


<label class="form-label">

Customer Name

</label>


<input

class="form-control"

name="customer_name"

value="<?=$customer['customer_name']?>"

required>


</div>





<div class="mb-3">


<label class="form-label">

Contact Number

</label>


<input

class="form-control"

name="contact_number"

value="<?=$customer['contact_number']?>">


</div>





<div class="mb-3">


<label class="form-label">

Status

</label>


<select

class="form-control"

name="status">


<option value="Active"

<?=($customer['status']=="Active")?"selected":""?>

>

Active

</option>



<option value="Inactive"

<?=($customer['status']=="Inactive")?"selected":""?>

>

Inactive

</option>


</select>


</div>





<div class="mb-3">


<label class="form-label">

Notes

</label>


<textarea

class="form-control"

rows="4"

name="notes">


<?=$customer['notes']?>


</textarea>


</div>




<div class="d-flex gap-2">


<button

class="btn btn-primary">

Save Changes

</button>



<a

href="customers.php"

class="btn btn-secondary">

Cancel

</a>


</div>



</form>



</div>


</div>



<?php include "../includes/footer.php"; ?>