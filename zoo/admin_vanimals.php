<?php
	session_start();
	require 'config/admin_config.php';
	$type_id="";
	$type_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>animals table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Animals Data</h2>
			
		<form class="myform" action="admin_vanimals.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Animal ID:</b></label>
					<input type="text" placeholder="Enter Animal ID" name="animal_id"><br><br>
					<label><b>Animal Name:</b>  </label>
					<input type="text" placeholder="Enter Animal Name" name="animal_name"><br><br>
				</center>
			</form>
			<a href="admin_animals.php"><button id="btn_edit" name="edit_btn" type="submit" href="animals.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql = "SELECT * FROM animals order by cage_no";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Animal Name</font> </th>
								<th> <font face="Arial">D.O.B</font> </th>
								<th> <font face="Arial">Measurement</font> </th>
								<th> <font face="Arial">Weight</font> </th> 
								<th> <font face="Arial">Age</font> </th>
								<th> <font face="Arial">Gender</font> </th>
								<th> <font face="Arial">Cage Number</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["animal_id"].'</td> 
									<td>'. $row["animal_name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["measurement"].'</td>
									<td>'. $row["weight"].'</td> 
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>
									<td>'. $row["cage_no"].'</td>
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
					$animal_id=$_POST['animal_id'];
					$animal_name=$_POST['animal_name'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($animal_id=="" && $animal_name=="")
						{
							echo '<script type="text/javascript">alert("Both Fields cannot be empty")</script>';
						}
							
						else if($animal_id!="" && $animal_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Animal Name and Animal ID")</script>';	
							
							$sql = "SELECT * FROM animals where animal_name='$animal_name' or animal_id='$animal_id' order by cage_no";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Animal Name</font> </th>
								<th> <font face="Arial">D.O.B</font> </th>
								<th> <font face="Arial">Measurement</font> </th>
								<th> <font face="Arial">Weight</font> </th> 
								<th> <font face="Arial">Age</font> </th>
								<th> <font face="Arial">Gender</font> </th>
								<td> <font face="Arial">Cage Number</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["animal_id"].'</td> 
											<td>'. $row["animal_name"].'</td>
											<td>'. $row["dob"].'</td>
											<td>'. $row["measurement"].'</td>
											<td>'. $row["weight"].'</td> 
											<td>'. $row["age"].'</td>
											<td>'. $row["gender"].'</td>
											<td>'. $row["cage_no"].'</td>											
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($animal_id!="" && $animal_name=="")
						{
							echo '<script type="text/javascript">alert("Search Based on Animal ID")</script>';	
							
							$sql = "SELECT * FROM animals where animal_id='$animal_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Animal Name</font> </th>
								<th> <font face="Arial">D.O.B</font> </th>
								<th> <font face="Arial">Measurement</font> </th>
								<th> <font face="Arial">Weight</font> </th> 
								<th> <font face="Arial">Age</font> </th>
								<th> <font face="Arial">Gender</font> </th>
								<th> <font face="Arial">Cage Number</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["animal_id"].'</td> 
									<td>'. $row["animal_name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["measurement"].'</td>
									<td>'. $row["weight"].'</td> 
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>
									<td>'. $row["cage_no"].'</td>									
					              </tr>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($animal_id=="" && $animal_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Animal Name")</script>';	
							
							$sql = "SELECT * FROM animals where animal_name='$animal_name'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Animal Name</font> </th>
								<th> <font face="Arial">D.O.B</font> </th>
								<th> <font face="Arial">Measurement</font> </th>
								<th> <font face="Arial">Weight</font> </th> 
								<th> <font face="Arial">Age</font> </th>
								<th> <font face="Arial">Gender</font> </th>
								<th> <font face="Arial">Cage Number</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["animal_id"].'</td> 
									<td>'. $row["animal_name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["measurement"].'</td>
									<td>'. $row["weight"].'</td> 
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>	
									<td>'. $row["cage_no"].'</td>
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