<?php

include "../config/database.php";


$sql="

SELECT

customers.customer_name,


IFNULL(SUM(deliveries.total_amount),0)

AS total_sales,


IFNULL(

(

SELECT SUM(amount)

FROM payments

WHERE payments.customer_id=customers.customer_id

),

0

)

AS total_paid



FROM customers



LEFT JOIN deliveries

ON customers.customer_id=deliveries.customer_id



GROUP BY customers.customer_id



ORDER BY customers.customer_name ASC


";


$result=mysqli_query($conn,$sql);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">



<div class="mb-4">


<h2 class="fw-bold">

Accounts Receivable

</h2>


<p class="text-muted">

Customer balances and outstanding payments

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

Total Sales

</th>


<th>

Total Paid

</th>


<th>

Balance

</th>


</tr>


</thead>



<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<?php

$balance=

$row['total_sales']

-

$row['total_paid'];

?>


<tr>


<td>

<?=$row['customer_name']?>

</td>



<td>

₱<?=number_format($row['total_sales'],2)?>

</td>



<td>

₱<?=number_format($row['total_paid'],2)?>

</td>



<td>


<?php if($balance>0){ ?>


<span class="badge bg-danger">

₱<?=number_format($balance,2)?>

</span>


<?php } else { ?>


<span class="badge bg-success">

Paid

</span>


<?php } ?>


</td>



</tr>



<?php } ?>



</tbody>


</table>



</div>



</div>



</div>


<?php include "../includes/footer.php"; ?>