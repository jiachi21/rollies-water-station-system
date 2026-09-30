<?php

include "../config/database.php";


$id=$_GET['id'];


// CUSTOMER

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



// LOCATION

$location=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT *

FROM customer_locations

WHERE customer_id=$id

LIMIT 1

"

)

);



// GALLON BALANCE

$gallon=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT

balance

FROM gallon_records

WHERE customer_id=$id

ORDER BY gallon_record_id DESC

LIMIT 1

"

)

);



$gallon_balance=$gallon['balance'] ?? 0;



// ACCOUNT BALANCE

$balance=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT

SUM(deliveries.total_amount)

-

IFNULL(

(

SELECT SUM(amount)

FROM payments

WHERE customer_id=$id

)

,0)

AS balance


FROM deliveries


WHERE customer_id=$id


"

)

);



$utang=$balance['balance'] ?? 0;



// DELIVERY HISTORY

$deliveries=mysqli_query(

$conn,

"

SELECT

deliveries.*,

trips.trip_date as date


FROM deliveries


JOIN trips

ON deliveries.trip_id=trips.trip_id


WHERE deliveries.customer_id=$id


ORDER BY delivery_id DESC


LIMIT 10

"

);



// PAYMENT HISTORY

$payments=mysqli_query(

$conn,

"

SELECT *

FROM payments

WHERE customer_id=$id


ORDER BY payment_id DESC


LIMIT 10


"

);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">



<h2>
👤 Customer Profile
</h2>




<div class="card p-4 mb-4">


<h3>

<?=$customer['customer_name']?>

</h3>



<hr>


<p>

📞

<strong>
Contact:
</strong>


<?=$customer['contact_number'] ?: '-'?>

</p>



<p>

📅

<strong>
Customer Since:
</strong>


<?=

$customer['customer_since']

?

date(
"m/d/Y",
strtotime($customer['customer_since'])
)

:

'-'

?>


</p>



<p>

Status:

<?php if($customer['status']=="Active"){ ?>


<span class="badge bg-success">

Active

</span>


<?php }else{ ?>


<span class="badge bg-secondary">

Inactive

</span>


<?php } ?>


</p>


</div>





<div class="row g-4">



<div class="col-md-4">


<div class="card p-4">


<h5>
💰 Account Balance
</h5>


<h3>

₱<?=number_format($utang,2)?>

</h3>


</div>


</div>




<div class="col-md-4">


<div class="card p-4">


<h5>
💧 Gallon Balance
</h5>


<h3>

<?=$gallon_balance?>

</h3>


</div>


</div>





<div class="col-md-4">


<div class="card p-4">


<h5>
📍 Location
</h5>



<?php if($location){ ?>


<p>

<?=$location['address']?>

</p>


<a

target="_blank"

class="btn btn-success btn-sm"

href="https://maps.google.com/?q=<?=$location['latitude']?>,<?=$location['longitude']?>">

Open Map

</a>


<?php }else{ ?>


<p>
No location added
</p>


<a

href="add_location.php?customer_id=<?=$id?>"

class="btn btn-primary btn-sm">

Add Location

</a>


<?php } ?>



</div>


</div>



</div>





<br>





<div class="card p-4 mb-4">


<div class="d-flex justify-content-between">


<h4>
🚚 Delivery History
</h4>


<a

href="add_delivery.php"

class="btn btn-primary btn-sm">

New Delivery

</a>


</div>



<table class="table table-hover">


<tr>

<th>Date</th>

<th>Slim</th>

<th>Round</th>

<th>Total</th>


</tr>



<?php while($row=mysqli_fetch_assoc($deliveries)){ ?>


<tr>


<td>

<?=date("m/d/Y",strtotime($row['date']))?>

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





<div class="card p-4 mb-4">


<h4>
💵 Payment History
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






<div class="d-flex gap-2">


<a

href="edit_customer.php?id=<?=$id?>"

class="btn btn-warning">

✏ Edit Customer

</a>



<a

href="customer_statement.php?id=<?=$id?>"

class="btn btn-primary">

📄 Statement

</a>



<a

href="customers.php"

class="btn btn-secondary">

← Back

</a>


</div>



</div>



<?php include "../includes/footer.php"; ?>