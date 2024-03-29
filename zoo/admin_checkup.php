<?php
	session_start();
	require 'config/admin_config.php';
	$animal_id="";
	$animalid="";	
	$checkup_id="";
	$symptoms="";
	$cost=0;
	$treatment="";
		
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
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_checkup.php" method="post">
			<label ><b>Animal Name:</b></label>
			<select name="animalid">
			<option value="">---Select---</option>
			<?php
				$query = "SELECT animal_id,animal_name FROM animals order by animal_id";
				$query_run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($query_run)) 
				{
					$animalid=$row['animal_id'];
					$animalname=$row['animal_name'];
					echo "<option value='".$animalid."'>$animalname</option>";
				}
				?>
			</select>
			<center>
				<br><br>
				<label><b>Checkup ID:</b>  </label>
				<input type="text" placeholder="Enter Checkup ID" name="checkup_id"><br><br>
				<label><b>Date and Time:</b></label>
				<input type="datetime-local" name="date_time"><br><br>
				<label><b>Symptoms:</b>  </label>
				<input type="text" placeholder="Enter the Symptoms" name="symptoms"><br><br>
				<label><b>Treatment:</b>  </label>
				<input type="text" placeholder="Enter the Treatment" name="treatment" ><br><br>
				<label><b>Cost:</b>  </label>
				<input type="number" placeholder="Enter the Cost" name="cost" step="0.1"><br><br>
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vcheckup.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$animal_id=$_POST["animalid"];
					$checkup_id=$_POST["checkup_id"];
					$cost=$_POST["cost"];
					$treatment=$_POST["treatment"];
					$symptoms=$_POST["symptoms"];
					$date_time=$_POST["date_time"];
					
					
					if($animal_id=="" || $checkup_id=="" || $date_time=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the compulsory feilds")</script>';
					}
					else{
						$query = "select * from checkup where checkup_id='$checkup_id'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Appointment already Noted.")</script>';
						}
						else
						{
						$query = "insert into checkup values('$checkup_id','$date_time','$symptoms','$treatment','$cost')";
							$query_run=mysqli_query($con,$query);
							$query = "insert into animal_checkup values('$animal_id','$checkup_id');";
							$query_run=mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Values Inserted Successfully")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.Values Not Inserted")</script>';
							}
						}
					
						}
			}
				
				else if(isset($_POST['update_btn']))
				{
					$animal_id=$_POST["animalid"];
					$checkup_id=$_POST["checkup_id"];
					$cost=$_POST["cost"];
					$treatment=$_POST["treatment"];
					$symptoms=$_POST["symptoms"];
					$date_time=$_POST["date_time"];
					
					if($animal_id !="" && $checkup_id !="" && $date_time=="" && $symptoms=="" && $treatment =="" && $cost=="")
					{
						echo '<script type="text/javascript">alert("Aniaml ID for the given Checkup ID being changed")</script>';
						$query= "select * from checkup where checkup_id='$checkup_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update animal_checkup SET animal_id='$animal_id' WHERE checkup_id='$checkup_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Checkup info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Checkup ID does not exist")</script>';
						}
					}
					else if($animal_id =="" && $checkup_id !="" && $date_time!="" && $symptoms!="" && $treatment !="" && $cost!="")
					{						
						echo '<script type="text/javascript">alert("Checkup info for the given Checkup ID being changed")</script>';
						$query= "select * from checkup where checkup_id='$checkup_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update checkup SET date_time='$date_time',symptoms='$symptoms',treatment='$treatment', cost=$cost WHERE checkup_id='$checkup_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Checkup info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Checkup ID does not exist")</script>';
						}
						
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['checkup_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Checkup ID to delete")</script>';
					}
					else
					{
						$checkup_id = $_POST['checkup_id'];
						$query= "select * from checkup where checkup_id='$checkup_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this Checkup.")</script>';
							$query = "delete from animal_checkup WHERE checkup_id='$checkup_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from checkup WHERE checkup_id='$checkup_id'";
							$query_run = mysqli_query($con,$query);
							
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Checkup deleted")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.")</script>';
							}
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Checkup ID not found")</script>';
						}
					}
				
				}
		?>

	</div>
	</center>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
</body>
</html>ā