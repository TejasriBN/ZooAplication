<?php
	session_start();
	require 'config/admin_config.php';
	$type_id="";
	$type_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>typeof table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Class of Species Data</h2>
		<form class="myform" action="admin_vtypeof.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Class ID:</b>  </label>
					<input type="text" placeholder="Enter Type ID" name="type_id"><br><br>
					<label><b>Class Name:</b></label>
					<input type="text" placeholder="Enter Type Name" name="type_name"><br><br>
					
				</center>
			</form>
			<a href="admin_typeof.php"><button id="btn_edit" name="edit_btn" type="submit" href="typeof.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql = "SELECT * FROM typeof order by type_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Class ID</font> </th> 
								<th> <font face="Arial">Class Name</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["type_id"].'</td> 
									<td>'. $row["type_name"].'</td> 
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
					$type_id=$_POST['type_id'];
					$type_name=$_POST['type_name'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($type_id=="" && $type_name=="")
						{
							echo '<script type="text/javascript">alert("Both Fields cannot be empty")</script>';
						}
							
						else if($type_id!="" && $type_name=="")
						{
							echo '<script type="text/javascript">alert("Search Based on Type ID")</script>';	
							
							$sql = "SELECT * FROM typeof where type_id='$type_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Class ID</font> </th> 
								<th> <font face="Arial">Class Name</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["type_id"].'</td> 
									<td>'. $row["type_name"].'</td> 
					              </tr>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($type_id=="" && $type_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Type Name")</script>';	
							
							$sql = "SELECT * FROM typeof where type_name='$type_name'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Class ID</font> </th> 
								<th> <font face="Arial">Class Name</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["type_id"].'</td> 
											<td>'. $row["type_name"].'</td> 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($type_id!="" && $type_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Type Name and Type ID")</script>';	
							
							$sql = "SELECT * FROM typeof where type_name='$type_name' or type_id='$type_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Class ID</font> </th> 
								<th> <font face="Arial">Class Name</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["type_id"].'</td> 
											<td>'. $row["type_name"].'</td> 
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