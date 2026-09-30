<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"

SELECT

customers.customer_name,

gallon_records.*


FROM gallon_records


JOIN customers

ON gallon_records.customer_id=customers.customer_id


ORDER BY gallon_record_id DESC


"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="mb-4">


<h2 class="fw-bold">

Gallon Accountability

</h2>


<p class="text-muted">

Track borrowed containers, returns, and customer balances

</p>


</div>




<div class="card shadow-sm p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>


<th>
Customer
</th>


<th>
Slim Borrowed
</th>


<th>
Round Borrowed
</th>


<th>
Slim Returned
</th>


<th>
Round Returned
</th>


<th>
Balance
</th>


</tr>


</thead>



<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=$row['customer_name']?>

</td>


<td>

<?=$row['slim_borrowed']?>

</td>


<td>

<?=$row['round_borrowed']?>

</td>


<td>

<?=$row['slim_returned']?>

</td>


<td>

<?=$row['round_returned']?>

</td>


<td>


<span class="badge bg-warning text-dark">

<?=$row['balance']?> gallons

</span>


</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


</div>



<?php include "../includes/footer.php"; ?>