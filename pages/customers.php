<?php

include "../config/database.php";


$sql="

SELECT *

FROM customers

ORDER BY customer_name ASC

";


$result=mysqli_query($conn,$sql);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between align-items-center mb-4">


<h2>

👥 Customer Management

</h2>



<a href="add_customer.php"

class="btn btn-primary">

➕ Add Customer

</a>


</div>




<div class="card p-4">



<input

type="text"

id="search"

class="form-control mb-3"

placeholder="🔍 Search customer...">





<div class="table-responsive">


<table

class="table table-hover align-middle"

id="customerTable">



<thead class="table-light">


<tr>


<th>ID</th>

<th>Name</th>

<th>Contact</th>

<th>Status</th>

<th>Ownership</th>

<th>Customer Since</th>

<th>Actions</th>


</tr>


</thead>




<tbody>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>



<td>

<?=$row['customer_id']?>

</td>




<td>

<?=$row['customer_name']?>

</td>




<td>

<?=$row['contact_number'] ?: '-';?>

</td>





<td>


<?php if($row['status']=="Active"){ ?>


<span class="badge bg-success">

Active

</span>


<?php }else{ ?>


<span class="badge bg-secondary">

Inactive

</span>


<?php } ?>


</td>





<td>


<?php if($row['ownership']=="Mother"){ ?>


<span class="badge bg-success">

🟢 Mother

</span>


<?php }else{ ?>


<span class="badge bg-primary">

🔵 Brother

</span>


<?php } ?>


</td>





<td>


<?=

$row['customer_since']

?

date("m/d/Y",strtotime($row['customer_since']))

:

'-'

?>


</td>





<td>



<a

href="view_customer.php?id=<?=$row['customer_id']?>"

class="btn btn-info btn-sm text-white">

View

</a>




<a

href="edit_customer.php?id=<?=$row['customer_id']?>"

class="btn btn-warning btn-sm">

Edit

</a>





<?php if($row['status']=="Active"){ ?>


<a

href="deactivate_customer.php?id=<?=$row['customer_id']?>"

class="btn btn-danger btn-sm">

Deactivate

</a>



<?php }else{ ?>


<a

href="deactivate_customer.php?id=<?=$row['customer_id']?>"

class="btn btn-success btn-sm">

Activate

</a>



<?php } ?>





<a

href="customer_statement.php?id=<?=$row['customer_id']?>"

class="btn btn-primary btn-sm">

Statement

</a>





<a

href="add_location.php?customer_id=<?=$row['customer_id']?>"

class="btn btn-success btn-sm">

📍 Location

</a>




</td>



</tr>



<?php } ?>



</tbody>


</table>


</div>


</div>


</div>





<script>


document

.getElementById("search")

.addEventListener("keyup",function(){



let value=this.value.toLowerCase();



document

.querySelectorAll("#customerTable tbody tr")

.forEach(row=>{



row.style.display =


row.innerText

.toLowerCase()

.includes(value)

?

""

:

"none";



});


});


</script>



<?php include "../includes/footer.php"; ?>