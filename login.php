<?php

session_start();

include "config/database.php";


if(isset($_POST['login'])){


$username=$_POST['username'];

$password=$_POST['password'];



$result=mysqli_query(
$conn,
"SELECT * FROM users WHERE username='$username'"
);



$user=mysqli_fetch_assoc($result);



if($user && $password==$user['password']){


$_SESSION['user']=$username;


header("Location:pages/dashboard.php");

exit;


}


$error="Invalid username or password";


}

?>


<!DOCTYPE html>

<html>


<head>


<title>
RWSMS Login
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<style>


body{

background:#f1f5f9;

height:100vh;

display:flex;

align-items:center;

justify-content:center;

}



.login-card{

width:380px;

border-radius:15px;

}



.logo{

width:120px;

height:120px;

object-fit:contain;

}



</style>


</head>



<body>



<div class="card login-card shadow p-4">


<div class="text-center mb-4">


<img

src="images/rollies-logo.webp"

class="logo"

alt="Rollies Logo"


>


</div>




<?php if(isset($error)){ ?>


<div class="alert alert-danger">

<?=$error?>

</div>


<?php } ?>




<form method="POST">



<label>

Username

</label>


<input

class="form-control mb-3"

name="username"

required

>



<label>

Password

</label>


<input

class="form-control mb-4"

type="password"

name="password"

required

>




<button

class="btn btn-primary w-100"

name="login"

>

Login

</button>



</form>


</div>



</body>


</html>