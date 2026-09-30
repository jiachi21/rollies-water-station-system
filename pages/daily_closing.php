<?php

include "../config/database.php";


$date=$_GET['date'] ?? date('Y-m-d');


// SALES

$sales=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT SUM(total_amount) total

FROM deliveries

JOIN trips

ON deliveries.trip_id=trips.trip_id

WHERE trips.trip_date='$date'

"

)

)['total'] ?? 0;



// CASH

$cash=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT SUM(amount) total

FROM payments

WHERE payment_date='$date'

"

)

)['total'] ?? 0;



$utang=$sales-$cash;



// EXPENSES

$expense_result=mysqli_query(

$conn,

"

SELECT *

FROM expenses

WHERE expense_date='$date'

ORDER BY category

"

);


$total_expenses=0;

$expenses=[];


while($row=mysqli_fetch_assoc($expense_result)){


$expenses[]=$row;

$total_expenses += $row['amount'];

}



// SALARY

$salary_result=mysqli_query(

$conn,

"

SELECT

salary_records.*,

employees.employee_name,

employees.role


FROM salary_records


JOIN employees

ON salary_records.employee_id=employees.employee_id


WHERE salary_date='$date'


"

);



$total_salary=0;

$salaries=[];


while($row=mysqli_fetch_assoc($salary_result)){


$salaries[]=$row;

$total_salary += $row['amount'];

}



// NET INCOME

$total_cost=$total_expenses+$total_salary;


$net_income=$sales-$total_cost;



// OWNERSHIP ONLY AFTER NET INCOME


$mother_sales=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT SUM(total_amount) total

FROM deliveries

JOIN trips

ON deliveries.trip_id=trips.trip_id


WHERE trips.trip_date='$date'

AND ownership='Mother'


"

)

)['total'] ?? 0;



$brother_sales=$sales-$mother_sales;



$mother_profit=0;

$brother_profit=0;


if($sales>0){

$mother_profit=

($mother_sales/$sales)*$net_income;


$brother_profit=

($brother_sales/$sales)*$net_income;

}



// OPERATIONS

$gallons=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT SUM(slim_out+round_out) total

FROM deliveries

JOIN trips

ON deliveries.trip_id=trips.trip_id


WHERE trips.trip_date='$date'


"

)

)['total'] ?? 0;



$trips=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT COUNT(*) total

FROM trips

WHERE trip_date='$date'


"

)

)['total'] ?? 0;


$customers=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT COUNT(DISTINCT customer_id) total

FROM deliveries

JOIN trips

ON deliveries.trip_id=trips.trip_id


WHERE trips.trip_date='$date'


"

)

)['total'] ?? 0;


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2 class="fw-bold">

Daily Closing Report

</h2>


<p class="text-muted">

Daily income statement

</p>



<div class="card shadow-sm p-4 mb-4">


<form method="GET">


<label>

Report Date

</label>


<input

type="date"

class="form-control"

name="date"

value="<?=$date?>">


<br>


<button class="btn btn-primary">

Generate Report

</button>


</form>


</div>





<div class="card shadow-sm p-4 mb-4">


<h3>

Income Statement

</h3>


<hr>


<h5>

Revenue

</h5>


<div class="d-flex justify-content-between">

<span>

Sales Revenue

</span>


<strong>

₱<?=number_format($sales,2)?>

</strong>


</div>



<div class="d-flex justify-content-between">

<span>

Cash Collected

</span>


<strong>

₱<?=number_format($cash,2)?>

</strong>


</div>



<div class="d-flex justify-content-between">

<span>

Accounts Receivable (Utang)

</span>


<strong>

₱<?=number_format($utang,2)?>

</strong>


</div>



<hr>


<h5>

Expenses

</h5>



<?php foreach($expenses as $expense){ ?>


<div class="d-flex justify-content-between">

<span>

<?=$expense['category']?>

</span>


<strong>

₱<?=number_format($expense['amount'],2)?>

</strong>


</div>


<?php } ?>



<div class="d-flex justify-content-between">

<span>

Employee Salary

</span>


<strong>

₱<?=number_format($total_salary,2)?>

</strong>


</div>



<hr>



<div class="d-flex justify-content-between">

<h4>

Net Income

</h4>


<h4>

₱<?=number_format($net_income,2)?>

</h4>


</div>


</div>





<div class="card shadow-sm p-4 mb-4">


<h3>

Ownership Profit Allocation

</h3>


<hr>



<p>

🟢 Mother Profit

<strong>

₱<?=number_format($mother_profit,2)?>

</strong>

</p>



<p>

🔵 Brother Profit

<strong>

₱<?=number_format($brother_profit,2)?>

</strong>

</p>


</div>






<div class="card shadow-sm p-4">


<h3>

Operations Summary

</h3>


<hr>


<p>

Date:

<?=date("m/d/Y",strtotime($date))?>

</p>


<p>

Trips Completed:

<?=$trips?>

</p>


<p>

Customers Served:

<?=$customers?>

</p>


<p>

Gallons Delivered:

<?=$gallons?>

</p>


</div>


</div>



<?php include "../includes/footer.php"; ?>