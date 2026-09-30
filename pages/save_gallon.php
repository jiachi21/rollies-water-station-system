<?php

include "../config/database.php";


$color=$_POST['color'];

$owner=$_POST['owner'];

$status=$_POST['status'];


$sql="
INSERT INTO gallon_inventory

(color,owner,status)

VALUES

('$color','$owner','$status')

";


mysqli_query($conn,$sql);


header("Location:gallon_inventory.php");

?>