<?php
	session_start();
	require 'config/visitor_config.php';
	$dept_id="";
	$dept_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>Departments table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	
	<center>
	<div id="main_wrapper">
		<h2>Department data</h2>
			
		<form class="myform" action="videpts.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Department ID:</b></label>
					<input type="text" placeholder="Enter Department ID" name="dept_id"><br><br>
					<label><b>Department Name:</b>  </label>
					<input type="text" placeholder="Enter Department Name" name="dept_name"><br><br>
				</center>
		</form>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL")</script>';
					
					$sql = "SELECT * FROM department order by dept_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Department ID</font> </td> 
								<td> <font face="Arial">Department Name</font> </td>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["dept_id"].'</td> 
									<td>'. $row["dept_name"].'</td>								
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
					$dept_id=$_POST['dept_id'];
					$dept_name=$_POST['dept_name'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($dept_id=="" && $dept_name=="")
						{
							echo '<script type="text/javascript">alert("Both Fields cannot be empty")</script>';
						}
							
						else if($dept_id!="" && $dept_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on dept Title and dept ID")</script>';	
							
							$sql = "SELECT * FROM department where dept_name='$dept_name' or dept_id='$dept_id'";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">dept ID</font> </td> 
								<td> <font face="Arial">dept Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["dept_id"].'</td> 
											<td>'. $row["dept_name"].'</td> 
										</tr><br>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($dept_id!="" && $dept_name=="")
						{
							echo '<script type="text/javascript">alert("Search Based on dept ID")</script>';	
							
							$sql = "SELECT * FROM department where dept_id='$dept_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">dept ID</font> </td> 
								<td> <font face="Arial">dept Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["dept_id"].'</td> 
									<td>'. $row["dept_name"].'</td>
					              </tr><br>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($dept_id=="" && $dept_name!="")
						{
							echo '<script type="text/javascript">alert("Search Based on dept Title")</script>';	
							
							$sql = "SELECT * FROM department where dept_name='$dept_name'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">dept ID</font> </td> 
								<td> <font face="Arial">dept Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["dept_id"].'</td> 
										<td>'. $row["dept_name"].'</td>
										</tr><br>';
								  
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