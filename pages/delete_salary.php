<?php

include "../config/database.php";


$id=$_GET['id'];



mysqli_query(

$conn,

"

DELETE FROM salary_records

WHERE salary_id='$id'

"

);



header("Location:salary_report.php");


?>