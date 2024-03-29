<?php
	session_start();
	require 'config/admin_config.php';
	$animal_id="";
	$checkup_id="";
?>
<!DOCTYPE html>
<html>
<head>
<title>checkup table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Checkup Data</h2>
			
		<form class="myform" action="admin_vcheckup.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Animal ID:</b></label>
					<input type="text" placeholder="Enter Animal ID" name="animal_id"><br><br>
					<label><b>Checkup ID:</b></label>
					<input type="text" placeholder="Enter Checkup ID" name="checkup_id"><br><br>
					<label><b>Date and Time:</b></label>
				<input type="datetime-local" name="date_time"><br><br>
				</center>
			</form>
			<a href="admin_checkup.php"><button id="btn_edit" name="edit_btn" type="submit" href="checkup.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql = "SELECT * FROM checkup INNER JOIN animal_checkup ON checkup.checkup_id = animal_checkup.checkup_id order by animal_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Checkup ID</font> </th>
								<th> <font face="Arial">Date and Time</font> </th>
								<th> <font face="Arial">Symptoms</font> </th>
								<th> <font face="Arial">Treatment</font> </th> 
								<th> <font face="Arial">Cost</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["animal_id"].'</td> 
									<td>'. $row["checkup_id"].'</td>
									<td>'. $row["date_time"].'</td>
									<td>'. $row["symptoms"].'</td>
									<td>'. $row["treatment"].'</td> 
									<td>'. $row["cost"].'</td>
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
					$checkup_id=$_POST['checkup_id'];
					$date_time=$_POST['date_time'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($animal_id=="" && $checkup_id=="" && $date_time=="")
						{
							echo '<script type="text/javascript">alert("All Fields cannot be empty")</script>';
						}
							
						else if($animal_id !="" && $checkup_id =="" && $date_time =="")
						{
							echo '<script type="text/javascript">alert("Search Based on Animal")</script>';	
							
							$sql = "SELECT * FROM checkup INNER JOIN animal_checkup ON checkup.checkup_id = animal_checkup.checkup_id where animal_id='$animal_id' order by animal_id";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Checkup ID</font> </th>
								<th> <font face="Arial">Date and Time</font> </th>
								<th> <font face="Arial">Symptoms</font> </th>
								<th> <font face="Arial">Treatment</font> </th> 
								<th> <font face="Arial">Cost</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["animal_id"].'</td> 
										<td>'. $row["checkup_id"].'</td>
										<td>'. $row["date_time"].'</td>
										<td>'. $row["symptoms"].'</td>
										<td>'. $row["treatment"].'</td> 
										<td>'. $row["cost"].'</td>	 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($animal_id=="" && $checkup_id!="" && $date_time=="")
						{
							echo '<script type="text/javascript">alert("Search Based on Checkup ID")</script>';	
							
							$sql = "SELECT * FROM checkup INNER JOIN animal_checkup ON checkup.checkup_id = animal_checkup.checkup_id where checkup.checkup_id='$checkup_id' order by checkup.checkup_id";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Checkup ID</font> </th>
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Date and Time</font> </th>
								<th> <font face="Arial">Symptoms</font> </th>
								<th> <font face="Arial">Treatment</font> </th> 
								<th> <font face="Arial">Cost</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
										<td>'. $row["checkup_id"].'</td>
										<td>'. $row["animal_id"].'</td> 
										<td>'. $row["date_time"].'</td>
										<td>'. $row["symptoms"].'</td>
										<td>'. $row["treatment"].'</td> 
										<td>'. $row["cost"].'</td>	 								
					              </tr>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($animal_id=="" && $checkup_id =="" && $date_time!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Date")</script>';	
							
							$sql = "SELECT * FROM checkup INNER JOIN animal_checkup ON checkup.checkup_id = animal_checkup.checkup_id where date_time>='$date_time' order by date_time";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Date and Time</font> </th>
								<th> <font face="Arial">Animal ID</font> </th> 
								<th> <font face="Arial">Checkup ID</font> </th>
								<th> <font face="Arial">Symptoms</font> </th>
								<th> <font face="Arial">Treatment</font> </th> 
								<th> <font face="Arial">Cost</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["date_time"].'</td>
										<td>'. $row["animal_id"].'</td> 
										<td>'. $row["checkup_id"].'</td>
										<td>'. $row["symptoms"].'</td>
										<td>'. $row["treatment"].'</td> 
										<td>'. $row["cost"].'</td>	 
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