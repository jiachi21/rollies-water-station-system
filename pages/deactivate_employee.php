<?php

include "../config/database.php";


$id=$_GET['id'];


// Get current status

$result=mysqli_query(
$conn,

"
SELECT status

FROM employees

WHERE employee_id=$id

"

);


$row=mysqli_fetch_assoc($result);



if($row['status']=="Active"){


$new_status="Inactive";


}

else{


$new_status="Active";


}



mysqli_query(
$conn,

"

UPDATE employees

SET status='$new_status'

WHERE employee_id=$id

"

);



header("Location:employees.php");


?>