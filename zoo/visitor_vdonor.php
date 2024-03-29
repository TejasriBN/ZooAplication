<?php
	session_start();
	require 'config/visitor_config.php';
	$donor_id="";
	$aadhar='';
	$name='';
	
	$age='';
	$gender='';
	$address='';
	$phone='';
	$blood_group='';
	$dob= date("Y-m-d");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>donor table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Donor Data</h2>
			
		<form class="myform" action="vdonor.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Donor ID:</b></label>
					<input type="text" placeholder="Enter Donor ID" name="donor_id"><br><br>
									
				</center>
			</form>
			<a href="donor.php"><button id="btn_edit" name="edit_btn" type="submit" href="donor.php">Edit</button>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL")</script>';
					
					$sql = "SELECT donor_id, donor.aadhar,name,dob,age,gender,address,phone,blood_group FROM donor inner join persons on person.aadhar=donor.aadhar order by donor_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Donor ID</font> </td> 
								<td> <font face="Arial">Aadhar</font> </td>
								<td> <font face="Arial">Name</font> </td>
								<td> <font face="Arial">Date of Birth</font> </td>
								<td> <font face="Arial">Age</font> </td>
								<td> <font face="Arial">Gender</font> </td>
								<td> <font face="Arial">Phone Number</font> </td>
								<td> <font face="Arial">Address</font> </td>
								<td> <font face="Arial">Blood Group</font> </td>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["donor_id"].'</td>
									<td>'. $row["aadhar"].'</td>
									<td>'. $row["name"].'</td>
									<td>'. $row["dob"].'</td> 
									<td>'. $row["age"].'</td> 
									<td>'. $row["gender"].'</td>
									<td>'. $row["phone"].'</td>
									<td>'. $row["address"].'</td>
									<td>'. $row["blood_group"].'</td> 
								</tr><br>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
				}
				
				if(isset($_POST['find_btn']))
				{
					$donor_id=$_POST['donor_id'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($donor_id=="")
						{
							echo '<script type="text/javascript">alert("Enter Donor ID")</script>';
						}
							
						else
						{
							echo '<script type="text/javascript">alert("Search Based on Donor ID")</script>';	
							
							$sql = "SELECT donor_id, donor.aadhar,name,dob,age,gender,address,phone,blood_group FROM donor inner join persons on person.aadhar=donor.aadhar where donor_id='$donor_id' order by donor_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Donor ID</font> </td> 
								<td> <font face="Arial">Aadhar</font> </td>
								<td> <font face="Arial">Name</font> </td>
								<td> <font face="Arial">Date of Birth</font> </td>
								<td> <font face="Arial">Age</font> </td>
								<td> <font face="Arial">Gender</font> </td>
								<td> <font face="Arial">Phone Number</font> </td>
								<td> <font face="Arial">Address</font> </td>
								<td> <font face="Arial">Blood Group</font> </td>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["donor_id"].'</td>
									<td>'. $row["aadhar"].'</td>
									<td>'. $row["name"].'</td>
									<td>'. $row["dob"].'</td> 
									<td>'. $row["age"].'</td> 
									<td>'. $row["gender"].'</td>
									<td>'. $row["phone"].'</td>
									<td>'. $row["address"].'</td>
									<td>'. $row["blood_group"].'</td> 
								</tr><br>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
						}
				}
						
						
				
				
			?>
			<br><br>
		</div>
	</center>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
</body>
</html>