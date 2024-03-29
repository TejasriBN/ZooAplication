<?php
	session_start();
	require 'config/admin_config.php';
	$type_id="";
	$typeid="";	
	$specie_id="";
	$specie_name="";
	$food="";
	$requirements="";
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
			<h3>Select the action to be performed</h3>
			
		<form class="myform" action="admin_species.php" method="post">
		
			<div>	
			<label >Class Name:</label>
 
			<select name="typeid">
			<option value="">---Select---</option>
			<?php
				$query = "SELECT type_id,type_name FROM typeof order by type_id";
				$query_run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($query_run)) 
				{
					$typeid=$row['type_id'];
					$typename=$row['type_name'];
					echo "<option value='".$typeid."'>$typename</option>";
				}
				?>
			</select>
 

				
				
				<br><br>
				<label><b>Specie ID:</b>  </label>
				<input type="text" placeholder="Enter Specie ID" name="specie_id"><br><br>
				<label><b>Specie Name:</b></label>
				<input type="text" placeholder="Enter Specie Name" name="specie_name"><br><br>
				<label><b>Food:</b>  </label>
				<input type="text" placeholder="Enter Food" name="food"><br><br>
				<label><b>Requirements:</b>  </label>
				<input type="text" placeholder="Enter the Requirements" name="requirements"><br><br>
				<br><br>
				</div>
				<center>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vspecies.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			if(isset($_POST['insert_btn']))
			{
					$type_id=$_POST["typeid"];
					$specie_id=$_POST['specie_id'];
					$specie_name=$_POST['specie_name'];
					$food=$_POST['food'];
					$requirements=$_POST['requirements'];
					
					if($type_id=="" || $specie_id=="" || $specie_name=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the compulsory feilds")</script>';
					}
					else{
						$query = "select * from species where specie_id='$specie_id' or specie_name='$specie_name'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Specie Alredy Exists")</script>';
						}
						else
						{
							$query = "insert into species values('$specie_id','$specie_name','$food','$requirements')";
							$query_run=mysqli_query($con,$query);
							$query = "insert into specie_type values('$type_id','$specie_id');";
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
					$type_id=$_POST["typeid"];
					$specie_id=$_POST['specie_id'];
					$specie_name=$_POST['specie_name'];
					$food=$_POST['food'];
					$requirements=$_POST['requirements'];
					if($type_id !="" && $specie_id !="" && $specie_name =="" && $food =="" && $requirements =="" )
					{
						echo '<script type="text/javascript">alert("Type ID for the given Specie ID being changed")</script>';
						$query= "select * from species where specie_id='$specie_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update specie_type SET type_id='$type_id' WHERE specie_id='$specie_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Specie info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Specie ID does not exist")</script>';
						}
					}
					else if($type_id =="" && $specie_id !="" && $specie_name!="" && $food !="" && $requirements !="" )
					{
						echo '<script type="text/javascript">alert("Specie info for the given Specie ID being changed")</script>';
						$query= "select * from species where specie_id='$specie_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update species SET specie_name='$specie_name',food='$food',requirements='$requirements' WHERE specie_id='$specie_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Specie info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Specie ID does not exist")</script>';
						}
						
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['specie_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Specie ID to delete")</script>';
					}
					else
					{
						$specie_id = $_POST['specie_id'];
						$query= "select * from species where specie_id='$specie_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this specie of animals.")</script>';
							
							$query = "delete * from animal_checkup where animal_id in (select animal_id from animal_species where specie_id='$specie_id')";
							$query_run = mysqli_query($con,$query);
										
							$query = "delete * from checkups where checkup_id not in (select checkup_id from animal_checkup)";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete * from animal_species where specie_id='$specie_id'";
							$query_run = mysqli_query($con,$query);
														
							$query = "delete * from animals where animal_id not in (select animal_id from animal_species)";
							$query_run = mysqli_query($con,$query);
														
							$query = "delete from specie_type WHERE specie_id='$specie_id'";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from species WHERE specie_id='$specie_id'";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Specie deleted")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.")</script>';
							}
							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Specie ID not found")</script>';
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
</html>