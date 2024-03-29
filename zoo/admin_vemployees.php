<?php
	session_start();
	require 'config/admin_config.php';
	$emp_id="";
	$aadhar_no="";	
	$post_id="";
?>
<!DOCTYPE html>
<html>
<head>
<title>employees table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Employee Data</h2>
			
		<form class="myform" action="admin_vemployees.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Aadhar Number:</b>  </label>
					<input type="text" placeholder="Enter Aadhar number" name="aadhar_no"><br><br>
					<label><b>Employee ID:</b></label>
					<input type="text" placeholder="Enter Employee ID" name="emp_id"><br><br>
					<label><b>Post ID:</b>  </label>
					<input type="text" placeholder="Enter Post ID" name="post_id"><br><br>
				</center>
			</form>
			<a href="admin_employees.php"><button id="btn_edit" name="edit_btn" type="submit" href="animals.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql="select * from employee,person where employee.aadhar_no=person.aadhar_no order by emp_id";
					$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Employee ID</font> </th> 
								<th> <font face="Arial">Aadhar Number</font> </th>
								<th> <font face="Arial">Post ID</font> </th>
								<th> <font face="Arial">Education</font> </th>
								<th> <font face="Arial">Experience</font> </th> 
								<th> <font face="Arial">Health_bg</font> </th>
								<th> <font face="Arial">Name</font> </th>
								<th> <font face="Arial">DOB</font> </th>
								<th> <font face="Arial">age</font> </th>
								<th> <font face="Arial">gender</font> </th>
								<th> <font face="Arial">address</font> </th>
								<th> <font face="Arial">phone number</font> </th>
								<th> <font face="Arial">Blood Group</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["emp_id"].'</td> 
									<td>'. $row["aadhar_no"].'</td>
									<td>'. $row["post_id"].'</td>
									<td>'. $row["education"].'</td>
									<td>'. $row["experience"].'</td> 
									<td>'. $row["health_bg"].'</td>
									<td>'. $row["name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>
									<td>'. $row["address"].'</td>
									<td>'. $row["phone"].'</td>
									<td>'. $row["blood_group"].'</td>
					              </tr>';
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
				}
				
				if(isset($_POST['find_btn']))
				{
					$emp_id=$_POST['emp_id'];
					$aadhar_no=$_POST['aadhar_no'];
					$post_id=$_POST['post_id'];
					
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($emp_id=="" && $aadhar_no=="" && $post_id=="")
						{
							echo '<script type="text/javascript">alert("At least one field is required")</script>';
						}
						
						else
						{
							echo '<script type="text/javascript">alert("Search Based on Given Fields")</script>';	
							$sql = "SELECT * FROM employee,person WHERE employee.aadhar_no=person.aadhar_no AND (emp_id='$emp_id' or post_id='$post_id' or employee.aadhar_no='$aadhar_no')";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Employee ID</font> </th> 
								<th> <font face="Arial">Aadhar Number</font> </th>
								<th> <font face="Arial">Post ID</font> </th>
								<th> <font face="Arial">Education</font> </th>
								<th> <font face="Arial">Experience</font> </th> 
								<th> <font face="Arial">Health_bg</font> </th>
								<th> <font face="Arial">Name</font> </th>
								<th> <font face="Arial">DOB</font> </th>
								<th> <font face="Arial">age</font> </th>
								<th> <font face="Arial">gender</font> </th>
								<th> <font face="Arial">address</font> </th>
								<th> <font face="Arial">phone number</font> </th>
								<th> <font face="Arial">Blood Group</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
									<td>'. $row["emp_id"].'</td> 
									<td>'. $row["aadhar_no"].'</td>
									<td>'. $row["post_id"].'</td>
									<td>'. $row["education"].'</td>
									<td>'. $row["experience"].'</td> 
									<td>'. $row["health_bg"].'</td>
									<td>'. $row["name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>
									<td>'. $row["address"].'</td>
									<td>'. $row["phone"].'</td>
									<td>'. $row["blood_group"].'</td>
					              </tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
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