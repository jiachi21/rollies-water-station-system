<?php

include "../config/database.php";


$trip_id=$_GET['trip_id'];


$customers=mysqli_query(

$conn,

"SELECT *

FROM customers

WHERE status='Active'"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<h2>

Add Customer Delivery

</h2>



<form action="save_delivery.php" method="POST">


<input type="hidden"

name="trip_id"

value="<?=$trip_id?>">



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

Slim Delivered

</label>


<input

class="form-control"

type="number"

id="slim"

name="slim_out"

value="0"

oninput="calculateAmount()">



<br>



<label>

Round Delivered

</label>


<input

class="form-control"

type="number"

id="round"

name="round_out"

value="0"

oninput="calculateAmount()">



<br>



<label>

Slim Returned

</label>


<input

class="form-control"

type="number"

name="slim_return"

value="0">



<br>



<label>

Round Returned

</label>


<input

class="form-control"

type="number"

name="round_return"

value="0">



<br>




<label>

Calculated Amount

</label>


<input

class="form-control"

id="calculated"

readonly>



<br>



<label>

Final Amount

</label>


<input

class="form-control"

name="manual_amount"

id="final"

placeholder="Enter final amount if different">



<br>



<button class="btn btn-primary">

Save Delivery

</button>



</form>



</div>


</div>




<script>


function calculateAmount(){


let slim=

Number(document.getElementById("slim").value);



let round=

Number(document.getElementById("round").value);



let total=

(slim*25)+(round*25);



document.getElementById("calculated").value=

total.toFixed(2);



document.getElementById("final").placeholder=

"Default ₱"+total.toFixed(2);


}


</script>



<?php include "../includes/footer.php"; ?>