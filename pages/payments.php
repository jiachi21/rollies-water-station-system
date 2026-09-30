<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"

SELECT

payments.*,

customers.customer_name


FROM payments


JOIN customers

ON payments.customer_id=customers.customer_id


ORDER BY payment_id DESC


"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
💰 Payment Records
</h2>


<a href="add_payment.php"

class="btn btn-primary mb-3">

➕ Record Payment

</a>



<div class="card p-4">


<table class="table table-hover">


<tr>

<th>Customer</th>

<th>Date</th>

<th>Amount</th>

<th>Method</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?=$row['customer_name']?>
</td>


<td>
<?=date("m/d/Y",strtotime($row['payment_date']))?>
</td>


<td>
₱<?=number_format($row['amount'],2)?>
</td>


<td>
<?=$row['payment_method']?>
</td>


</tr>


<?php } ?>


</table>


</div>


</div>


<?php include "../includes/footer.php"; ?>