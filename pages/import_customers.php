<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2>
Import Customer Data
</h2>


<div class="card p-4">


<form action="process_import.php"
method="POST"
enctype="multipart/form-data">


<label>
Upload Excel / CSV File
</label>


<br><br>


<input 
type="file"
name="file"
accept=".xlsx,.xls,.csv"
required>


<br><br>


<button class="btn btn-primary">

Import Customers

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>