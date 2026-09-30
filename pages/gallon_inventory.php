<?php

include "../config/database.php";

$result=mysqli_query(
$conn,

"
SELECT 

gallon_inventory.*,

customers.customer_name


FROM gallon_inventory


LEFT JOIN customers

ON gallon_inventory.current_customer_id = customers.customer_id

"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
🟢 Gallon Ownership Tracking
</h2>


<a href="add_gallon.php"
class="btn btn-primary">

Add Gallon

</a>


<br><br>


<table class="table table-bordered">


<tr>

<th>ID</th>

<th>Gallon Number</th>

<th>Color</th>

<th>Owner</th>

<th>Holder</th>

<th>Status</th>

</tr>


<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?=$row['gallon_id']?>
</td>


<td>
<?=$row['gallon_number']?>
</td>


<td>
<?=$row['color']?>
</td>


<td>
<?=$row['owner']?>
</td>


<td>
<?=$row['customer_name'] ?? 'Station'?>
</td>


<td>
<?=$row['status']?>
</td>


</tr>


<?php } ?>


</table>


</div>


<?php include "../includes/footer.php"; ?>