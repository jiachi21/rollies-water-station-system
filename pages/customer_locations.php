<?php

include "../config/database.php";


$result=mysqli_query(
$conn,

"
SELECT

customer_locations.*,

customers.customer_name


FROM customer_locations


JOIN customers

ON customer_locations.customer_id =
customers.customer_id

"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
📍 Customer Locations
</h2>


<table class="table">


<tr>

<th>
Customer
</th>

<th>
Address
</th>

<th>
Map
</th>

</tr>


<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=$row['customer_name']?>

</td>


<td>

<?=$row['address']?>

</td>


<td>


<a target="_blank"

href="https://maps.google.com/?q=<?=$row['latitude']?>,<?=$row['longitude']?>"

class="btn btn-success btn-sm">

Open Map

</a>


</td>


</tr>


<?php } ?>


</table>


</div>


<?php include "../includes/footer.php"; ?>