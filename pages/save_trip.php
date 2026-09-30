<?php

include "../config/database.php";


$date=$_POST['trip_date'] ?? '';

$driver_id=(int)($_POST['driver_id'] ?? 0);

$helper_id=$_POST['helper_id'] ?? '';

$refiller_id=$_POST['refiller_id'] ?? '';

$cleaner_id=$_POST['cleaner_id'] ?? '';

$notes=mysqli_real_escape_string(

$conn,

$_POST['notes'] ?? ''

);

$slim_loaded=(int)($_POST['slim_loaded'] ?? 0);

$round_loaded=(int)($_POST['round_loaded'] ?? 0);



// Optional employee fields

$helper_sql=

$helper_id === ''

?

"NULL"

:

(int)$helper_id;



$refiller_sql=

$refiller_id === ''

?

"NULL"

:

(int)$refiller_id;



$cleaner_sql=

$cleaner_id === ''

?

"NULL"

:

(int)$cleaner_id;



if(

$date === ''

||

$driver_id <= 0

){

die("Trip date and driver are required.");

}



mysqli_begin_transaction($conn);



try{


$sql="

INSERT INTO trips

(

trip_date,

driver_id,

helper_id,

refiller_id,

cleaner_id,

notes

)


VALUES

(

'$date',

'$driver_id',

$helper_sql,

$refiller_sql,

$cleaner_sql,

'$notes'

)

";



if(!mysqli_query($conn,$sql)){

throw new Exception(mysqli_error($conn));

}



$trip_id=mysqli_insert_id($conn);



$inventory="

INSERT INTO trip_inventory

(

trip_id,

slim_loaded,

round_loaded

)


VALUES

(

'$trip_id',

'$slim_loaded',

'$round_loaded'

)

";



if(!mysqli_query($conn,$inventory)){

throw new Exception(mysqli_error($conn));

}



mysqli_commit($conn);



header(

"Location:trip_deliveries.php?id=".$trip_id

);

exit;


}

catch(Exception $e){


mysqli_rollback($conn);


echo "<h3>Unable to create trip</h3>";

echo "<p>".htmlspecialchars($e->getMessage())."</p>";

echo '<p><a href="add_trip.php">Go Back</a></p>';


}


?>