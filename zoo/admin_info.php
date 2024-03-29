<?php
	session_start();
	require 'config/admin_config.php';
?>
<!DOCTYPE html>
<html>
<style>



</style>
<head>
<title>Visitor Info</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
th {border: 1px solid black;}
td {border: 1px solid black;}

.image{
	width:500px;
	text-align:right;
	border-radius:50%;
}
</style>
<body>
<br>
<div class="text_wrapper">
	<center>
		<h2><u>Visitor Information</u></h2>
	</center>
	
	<img src="img/elephant-logo.jpg" class="image" style="float: right"/>
	
	<u>Billing Details</u>
	 <table class="data_table">
		<tr>
			<th>Category</th>
			<th>Fee</th>
		</tr>
		<tr>
			<td><center>Adult</center></td>
			<td><center>100</center></td>
		</tr>
		<tr>
			<td><center>Child</center></td>
			<td><center>50</center></td>
		</tr>
		<tr>
			<td><center>Digital Camera</center></td>
			<td><center>75</center></td>
		</tr>
		<tr>
			<td><center>Cellphone Camera</center></td>
			<td><center>50</center></td>
		</tr>
	</table>
	<br>
	<u>NOTE:</u><br>
	1. 'Child' refers to ages 0-6yrs.<br>
	2. Discounts apply only to persons' entry. gadgets are charged in full.<br>
	3. Fines charged for misbehaviour listed below.<br>
	<br>
	<u>Fines</u>
	<table class="data_table">
		<tr>
			<th>infringement</th>
			<th>Amount</th>
		</tr>
		<tr>
			<td><center>Littering</center></td>
			<td><center>500Rs</center></td>
		</tr>
		<tr>
			<td><center>Feeding Animals</center></td>
			<td><center>1500Rs</center></td>
		</tr>
		<tr>
			<td><center>Graffiti</center></td>
			<td><center>1000Rs</center></td>
		</tr>
		<tr>
			<td><center>Property Damage</center></td>
			<td><center>full price of repair</center></td>
		</tr>
	</table>
</div>
		


</body>
</html>