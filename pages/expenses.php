<?php

include "../config/database.php";


$result=mysqli_query(

$conn,

"SELECT * FROM expenses ORDER BY expense_id DESC"

);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
📉 Expenses
</h2>


<a href="add_expense.php"

class="btn btn-primary mb-3">

➕ Add Expense

</a>



<div class="card p-4">


<table class="table table-hover">


<tr>

<th>Date</th>

<th>Category</th>

<th>Amount</th>

<th>Description</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?=date("m/d/Y",strtotime($row['expense_date']))?>

</td>


<td>

<?=$row['category']?>

</td>


<td>

₱<?=number_format($row['amount'],2)?>

</td>


<td>

<?=$row['description']?>

</td>


</tr>


<?php } ?>


</table>


</div>


</div>


<?php include "../includes/footer.php"; ?>