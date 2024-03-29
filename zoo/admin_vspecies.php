<?php
	session_start();
	require 'config/admin_config.php';
	$type_id="";
	$type_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>species table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Species Data</h2>
			
		<form class="myform" action="admin_vspecies.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Specie ID:</b></label>
					<input type="text" placeholder="Enter Specie ID" name="specie_id"><br><br>
					<label><b>Specie Name:</b>  </label>
					<input type="text" placeholder="Enter Specie Name" name="specie_name"><br><br>
				</center>
			</form>
			<a href="admin_species.php"><button id="btn_edit" name="edit_btn" type="submit" href="species.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql = "SELECT * FROM species order by specie_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Specie ID</font> </th> 
								<th> <font face="Arial">Specie Name</font> </th>
								<th> <font face="Arial">Food</font> </th>
								<th> <font face="Arial">Requirements</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["specie_id"].'</td> 
									<td>'. $row["specie_name"].'</td>
									<td>'. $row["food"].'</td>
									<td>'. $row["requirements"].'</td>									
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
					$specie_id=$_POST['specie_id'];
					$specie_name=$_POST['specie_name'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($specie_id=="" && $specie_name=="")
						{
							echo '<script type="text/javascript">alert("Both Fields cannot be empty")</script>';
						}
							
						else if($specie_id!="" && $specie_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Specie Name and Specie ID")</script>';	
							
							$sql = "SELECT * FROM species where specie_name='$specie_name' or specie_id='$specie_id'";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Specie ID</font> </th> 
								<th> <font face="Arial">Specie Name</font> </th>
								<th> <font face="Arial">Food</font> </th>
								<th> <font face="Arial">Requirements</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["specie_id"].'</td> 
											<td>'. $row["specie_name"].'</td>
											<td>'. $row["food"].'</td>
											<td>'. $row["requirements"].'</td>	 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($specie_id!="" && $specie_name=="")
						{
							echo '<script type="text/javascript">alert("Search Based on Specie ID")</script>';	
							
							$sql = "SELECT * FROM species where specie_id='$specie_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Specie ID</font> </th> 
								<th> <font face="Arial">Specie Name</font> </th>
								<th> <font face="Arial">Food</font> </th>
								<th> <font face="Arial">Requirements</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["specie_id"].'</td> 
									<td>'. $row["specie_name"].'</td>
									<td>'. $row["food"].'</td>
									<td>'. $row["requirements"].'</td>									
					              </tr>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($specie_id=="" && $specie_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Specie Name")</script>';	
							
							$sql = "SELECT * FROM species where specie_name='$specie_name'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Specie ID</font> </th> 
								<th> <font face="Arial">Specie Name</font> </th>
								<th> <font face="Arial">Food</font> </th>
								<th> <font face="Arial">Requirements</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["specie_id"].'</td> 
										<td>'. $row["specie_name"].'</td>
										<td>'. $row["food"].'</td>
										<td>'. $row["requirements"].'</td>	 
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