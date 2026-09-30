<?php

include "../config/database.php";


$customers=mysqli_query(

$conn,

"SELECT * FROM customers WHERE status='Active'"

);

?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card p-4">


<h2>
💰 Record Payment
</h2>



<form action="save_payment.php" method="POST">



<label>
Customer
</label>


<select

class="form-control"

name="customer_id">


<?php while($row=mysqli_fetch_assoc($customers)){ ?>


<option value="<?=$row['customer_id']?>">

<?=$row['customer_name']?>

</option>


<?php } ?>


</select>


<br>


<label>
Date
</label>


<input

class="form-control"

type="date"

name="payment_date"

required>


<br>


<label>
Amount
</label>


<input

class="form-control"

type="number"

name="amount"

required>


<br>


<label>
Payment Method
</label>


<select

class="form-control"

name="payment_method">


<option>
Cash
</option>


<option>
GCash
</option>


</select>


<br>


<button class="btn btn-success">

Save Payment

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>