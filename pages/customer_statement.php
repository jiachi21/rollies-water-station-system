<?php

include "../config/database.php";


$id=$_GET['id'];



$customer=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT *

FROM customers

WHERE customer_id=$id

"

)

);



$deliveries=mysqli_query(

$conn,

"

SELECT *

FROM deliveries

WHERE customer_id=$id

ORDER BY delivery_id DESC

"

);



$payments=mysqli_query(

$conn,

"

SELECT *

FROM payments

WHERE customer_id=$id

ORDER BY payment_id DESC

"

);



?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">



<h2>
📄 Customer Statement
</h2>



<div class="card p-4 mb-4">


<h4>

<?=$customer['customer_name']?>

</h4>


<p>

Customer Account Statement

</p>


</div>




<div class="card p-4 mb-4">


<h4>
🚚 Deliveries
</h4>



<table class="table table-hover">


<tr>

<th>Date</th>

<th>Slim</th>

<th>Round</th>

<th>Amount</th>


</tr>



<?php while($row=mysqli_fetch_assoc($deliveries)){ ?>


<tr>


<td>

<?=date("m/d/Y",strtotime($row['created_at']))?>

</td>


<td>

<?=$row['slim_out']?>

</td>


<td>

<?=$row['round_out']?>

</td>


<td>

₱<?=number_format($row['total_amount'],2)?>

</td>


</tr>


<?php } ?>


</table>


</div>





<div class="card p-4">


<h4>
💵 Payments
</h4>



<table class="table table-hover">


<tr>

<th>Date</th>

<th>Amount</th>

<th>Method</th>


</tr>



<?php while($row=mysqli_fetch_assoc($payments)){ ?>


<tr>


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