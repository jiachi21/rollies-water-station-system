<?php

include "../config/database.php";


$customer_id=$_GET['customer_id'];



$result=mysqli_query(

$conn,

"
SELECT *

FROM customers

WHERE customer_id=$customer_id

"

);


$customer=mysqli_fetch_assoc($result);


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card p-4">


<h2>
📍 Add Customer Location
</h2>



<form action="save_location.php" method="POST">



<input

type="hidden"

name="customer_id"

value="<?=$customer['customer_id']?>">



<label>
Customer
</label>


<input

class="form-control"

value="<?=$customer['customer_name']?>"

readonly>


<br>



<label>
Address
</label>


<input

class="form-control"

name="address"

required>


<br>



<label>
Select Location Pin
</label>


<div id="map"

style="height:400px;border-radius:10px;">

</div>


<br>



<label>
Latitude
</label>


<input

class="form-control"

id="latitude"

name="latitude"

readonly>


<br>



<label>
Longitude
</label>


<input

class="form-control"

id="longitude"

name="longitude"

readonly>


<br>



<button class="btn btn-primary">

💾 Save Location

</button>



</form>


</div>


</div>



<link rel="stylesheet"

href="https://unpkg.com/leaflet/dist/leaflet.css">


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>



<script>


let map=L.map('map')

.setView(

[14.9547,120.8967],

13

);



L.tileLayer(

'https://tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19

}

).addTo(map);



let marker;



map.on('click',function(e){


let lat=e.latlng.lat;

let lng=e.latlng.lng;


document
.getElementById("latitude")
.value=lat;



document
.getElementById("longitude")
.value=lng;



if(marker){

map.removeLayer(marker);

}



marker=L.marker(

[lat,lng]

)

.addTo(map);



});



</script>


<?php include "../includes/footer.php"; ?>