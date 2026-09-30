<?php

include "../config/database.php";



$trip_id=$_POST['trip_id'];

$customer_id=$_POST['customer_id'];



$slim_out=$_POST['slim_out'];

$round_out=$_POST['round_out'];

$slim_return=$_POST['slim_return'];

$round_return=$_POST['round_return'];



$manual_amount=$_POST['manual_amount'];




// GET CUSTOMER OWNERSHIP

$owner_query=mysqli_query(

$conn,

"

SELECT ownership

FROM customers

WHERE customer_id='$customer_id'

"

);



$owner=mysqli_fetch_assoc($owner_query);



$ownership=$owner['ownership'] ?? 'Brother';





// DEFAULT COMPUTATION

$computed_amount =

($slim_out * 25)

+

($round_out * 25);




// FINAL AMOUNT

if($manual_amount!=""){


$total_amount=$manual_amount;


}else{


$total_amount=$computed_amount;


}







$sql="

INSERT INTO deliveries

(

trip_id,

customer_id,

slim_out,

round_out,

slim_return,

round_return,

total_amount,

ownership

)


VALUES

(

'$trip_id',

'$customer_id',

'$slim_out',

'$round_out',

'$slim_return',

'$round_return',

'$total_amount',

'$ownership'

)

";





if(mysqli_query($conn,$sql)){



$delivery_id=mysqli_insert_id($conn);





// GALON RECORD


$previous=mysqli_fetch_assoc(

mysqli_query(

$conn,

"

SELECT balance

FROM gallon_records

WHERE customer_id='$customer_id'

ORDER BY gallon_record_id DESC

LIMIT 1

"

)

);



$old_balance=$previous['balance'] ?? 0;



$new_balance=

$old_balance

+

$slim_out

+

$round_out

-

$slim_return

-

$round_return;







mysqli_query(

$conn,

"

INSERT INTO gallon_records

(

customer_id,

delivery_id,

slim_borrowed,

round_borrowed,

slim_returned,

round_returned,

balance

)


VALUES

(

'$customer_id',

'$delivery_id',

'$slim_out',

'$round_out',

'$slim_return',

'$round_return',

'$new_balance'

)

"

);




header(

"Location:trip_deliveries.php?id=$trip_id"

);


exit;


}



else{


echo mysqli_error($conn);


}



?>