<!DOCTYPE html>
<html>

<head>
    <title>Add Customer - RWSMS</title>
</head>

<body>

<h1>Add New Customer</h1>


<form action="save_customer.php" method="POST">


<label>
Customer Name:
</label>
<br>

<input type="text" name="customer_name" required>

<br><br>


<label>
Contact Number:
</label>
<br>

<input type="text" name="contact_number">

<br><br>


<label>
Customer Since:
</label>
<br>

<input type="date" name="customer_since">

<br><br>


<label>
Status:
</label>
<br>

<select name="status">

<option value="Active">
Active
</option>

<option value="Inactive">
Inactive
</option>

<option value="Unknown">
Unknown
</option>

</select>


<br><br>


<label>
Notes:
</label>

<br>

<textarea name="notes"></textarea>


<br><br>


<button type="submit">
Save Customer
</button>


</form>


</body>

</html>