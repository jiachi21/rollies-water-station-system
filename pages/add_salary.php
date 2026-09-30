<?php

include "../config/database.php";


$employees=mysqli_query(

$conn,

"

SELECT *

FROM employees

WHERE status='Active'

ORDER BY employee_name

"

);

?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card shadow-sm p-4">


<h2 class="fw-bold">

Add Salary

</h2>



<form action="save_salary.php" method="POST">



<label>

Salary Date

</label>


<input

type="date"

class="form-control"

name="salary_date"

id="date"

onchange="calculateSalary()"

required>



<br>




<label>

Employee

</label>


<select

class="form-control"

name="employee_id"

id="employee"

onchange="calculateSalary()">


<?php while($row=mysqli_fetch_assoc($employees)){ ?>


<option

value="<?=$row['employee_id']?>"

data-type="<?=$row['salary_type']?>"

data-rate="<?=$row['salary_rate']?>">


<?=$row['employee_name']?>


</option>


<?php } ?>


</select>



<br>




<label>

Gallons From Trips

</label>


<input

class="form-control"

id="gallons"

readonly>


<br>




<label>

Salary Type

</label>


<input

class="form-control"

id="type"

readonly>


<br>




<label>

Rate

</label>


<input

class="form-control"

id="rate"

readonly>


<br>




<label>

Computed Salary

</label>


<input

class="form-control"

id="computed"

name="computed_amount"

readonly>


<br>




<label>

Final Salary

</label>


<input

type="number"

class="form-control"

name="amount"

placeholder="Override if needed"

required>


<br>



<label>

Notes

</label>


<textarea

class="form-control"

name="notes">

</textarea>


<br>



<button

class="btn btn-primary">

Save Salary

</button>



</form>


</div>


</div>




<script>


function calculateSalary(){


let date=document.getElementById("date").value;

let emp=document.getElementById("employee").value;


if(date=="" || emp=="") return;



fetch(

"get_employee_gallons.php?date="+date+"&employee="+emp

)

.then(response=>response.json())

.then(data=>{


let selected=document.getElementById("employee")

.options[document.getElementById("employee").selectedIndex];



let type=selected.dataset.type;

let rate=parseFloat(selected.dataset.rate);


let gallons=parseFloat(data.gallons);



let salary;



if(type=="Per Gallon"){


salary=gallons*rate;


}

else{


salary=rate;


}



document.getElementById("gallons").value=gallons;

document.getElementById("type").value=type;

document.getElementById("rate").value=rate;

document.getElementById("computed").value=salary.toFixed(2);



});


}



</script>



<?php include "../includes/footer.php"; ?>