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
			<h3>Select the action to be performed</h3>
			
			
			
			
			
			
		<form class="myform" action="admin_typeof.php" method="post">
		
				<label><b>Class ID:</b>  </label>
				<input type="text" placeholder="Enter Type ID" name="type_id"><br><br>
				<label><b>Class Name:</b></label>
				<input type="text" placeholder="Enter Type Name" name="type_name"><br><br>
					<br>
				<center>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			<a href="admin_vtypeof.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
			<?php
			
				if(isset($_POST['insert_btn'])){
					
					
					$type_id=$_POST['type_id'];
					$type_name=$_POST['type_name'];
					
					if($type_id=="" || $type_name=="")
					{
						echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
					}
					else{
						
						
						$query= "select * from typeof where type_id='$type_id' or type_name='$type_name'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript"> alert("Type already Exists") </script>';
						}
						else
						{
							$query= "insert into typeof values('$type_id','$type_name')";
							$query_run = mysqli_query($con,$query);
						
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Values Inserted Successfully")</script>';
							}
							else
							{
							echo '<script type="text/javascript">alert("Values Not Inserted")</script>';
							}
						}
						
					}
					
				}
				
				else if(isset($_POST['update_btn']))
				{
					if($_POST['type_id']=="" || $_POST['type_name']=="")
					{
						echo '<script type="text/javascript">alert("Enter Data in All fields")</script>';
					}
					else
					{
						$type_id=$_POST['type_id'];
						$type_name=$_POST['type_name'];
												
						$query= "select * from typeof where type_id='$type_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update typeof SET type_name='$type_name' WHERE type_id='$type_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Type Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Type ID does not exist")</script>';
						}
						
					}
				}
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['type_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Type ID to delete")</script>';
					}
				else{
						$type_id = $_POST['type_id'];
						$query= "select * from typeof where type_id='$type_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this type of animals.")</script>';
							
							$query = "delete from animal_checkup where animal_id in (select animal_id from animal_species where specie_id in( select specie_id from specie_type where type_id='$type_id'))";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from checkup where checkup_id not in (select checkup_id from animal_checkup)";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from animal_species where specie_id in( select specie_id from specie_type where type_id='$type_id')";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from animals where animal_id not in (select animal_id from animal_species)";
							$query_run = mysqli_query($con,$query);
														
							$query = "delete from specie_type WHERE type_id='$type_id'";
							$query_run = mysqli_query($con,$query);
														
							$query = "delete from species WHERE specie_id not in (select specie_id from specie_type)";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from typeof WHERE type_id='$type_id'";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Type deleted")</script>';
							}
							else
							{
							echo '<script type="text/javascript">alert("Error.")</script>';
							}
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Type ID not found")</script>';
						}
					}
				
				
				}
			
			?>
			
			
		</form>
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