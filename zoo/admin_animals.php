<?php
	session_start();
	require 'config/admin_config.php';
	$specie_id="";
	$specieid="";	
	$animal_id="";
	$animal_name="";
	$measurement="";
	$weight=0;
	$age=0;
	$gender="";
	$cage="";
	$dob = date("Y-m-d");
	$today = date("Y-m-d");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>animal table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Animal Data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_animals.php" method="post">
			<label >Specie Name:</label>
			<select name="specieid">
			<option value="">---Select---</option>
			<?php
				$query = "SELECT specie_id,specie_name FROM species order by specie_id";
				$query_run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($query_run)) 
				{
					$specieid=$row['specie_id'];
					$speciename=$row['specie_name'];
					echo "<option value='".$specieid."'>$speciename</option>";
				}
				?>
			</select>
			<center>
				<br><br>
				<label><b>Animal ID:</b>  </label>
				<input type="text" placeholder="Enter Animal ID" name="animal_id"><br><br>
				<label><b>Animal Name:</b></label>
				<input type="text" placeholder="Enter Animal Name" name="animal_name"><br><br>
				<label><b>Date of Birth:</b>  </label>
				<input type="date" placeholder="Enter the DOB" name="dob" max=<?php echo $today?>><br><br>
				<label><b>Measurements:</b>  </label>
				<input type="text" placeholder="Enter the required Measurements" name="measurement"><br><br>
				<label><b>Weight:</b>  </label>
				<input type="number" placeholder="Enter the Weight in kg" name="weight" step="0.1"><br><br>
				<label><b>Age:</b>  </label>
				<input type="number" placeholder="Enter the Age" name="age" ><br><br>
				<label><b>Gender:</b></label><br>
				<input name="gender" type="radio" class="radiobtns" value="" checked>None<br>
				<input name="gender" type="radio" class="radiobtns" value="male">Male<br>
				<input name="gender" type="radio" class="radiobtns" value="female">Female<br>
				<br><label><b>Cage Number:</b>  </label>
				<input type="text" placeholder="Enter the Cage Number" name="cage"><br>
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vanimals.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$specie_id=$_POST["specieid"];
					$animal_id=$_POST['animal_id'];
					$animal_name=$_POST['animal_name'];
					$dob=$_POST['dob'];
					$measurement=$_POST['measurement'];
					$weight=$_POST["weight"];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$cage=$_POST['cage'];
					
					if($animal_id=="" || $specie_id=="" || $animal_name=="" || $cage=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the compulsory feilds")</script>';
					}
					else{
						$query = "select * from animals where animal_id='$animal_id' or animal_name='$animal_name'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Animal Alredy Exists")</script>';
						}
						else
						{
						$query = "insert into animals values('$animal_id','$animal_name','$dob','$measurement','$weight','$age','$gender','$cage')";
							$query_run=mysqli_query($con,$query);
							$query = "insert into animal_species values('$animal_id','$specie_id');";
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
					$specie_id=$_POST['specieid'];
					$animal_id=$_POST['animal_id'];
					$animal_name=$_POST['animal_name'];
					$dob=$_POST['dob'];
					$measurement=$_POST['measurement'];
					$weight=$_POST["weight"];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$cage=$_POST['cage'];
					//echo "$animal_id' && '$specie_id' && '$animal_name' && '$weight' && '$measurement' && '$dob' && '$gender' && '$age'" ;
					
					if($animal_id !="" && $specie_id !="" && $animal_name =="" && $weight =="" && $measurement =="" && $dob =="" && $gender ==""&& $age =="" )
					{
						echo '<script type="text/javascript">alert("Specie ID for the given Animal ID being changed")</script>';
						$query= "select * from animals where animal_id='$animal_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update animal_species SET specie_id='$specie_id' WHERE animal_id='$animal_id'";
							$query_run=mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Animal info Updated Successfully")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.")</script>';
							}							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Animal ID does not exist")</script>';
						}
					}
					else if($specie_id =="" && $animal_id !="" && $animal_name!="" && $dob !="" && $measurement !="" && $weight !="" && $gender !=""&& $age!="")
					{
						
						echo '<script type="text/javascript">alert("Animal info for the given Animal ID being changed")</script>';
						$query= "select * from animals where animal_id='$animal_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update animals SET animal_name='$animal_name',gender='$gender',measurement='$measurement',dob='$dob',age='$age',weight='$weight',cage_no='$cage' WHERE animal_id='$animal_id'";
							$query_run=mysqli_query($con,$query);	
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Animal info Updated Successfully")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.")</script>';
							}							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Animal ID does not exist")</script>';
						}
						
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['animal_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Animal ID to delete")</script>';
					}
					else
					{
						$animal_id = $_POST['animal_id'];
						$query= "select * from animals where animal_id='$animal_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this animal.")</script>';
							$query = "delete from animal_checkup where animal_id='$animal_id'";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from checkup where checkup_id not in (select checkup_id from animal_checkup)";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from animal_species where animal_id='$animal_id'";
							$query_run = mysqli_query($con,$query);
							
							$query = "delete from animals where animal_id='$animal_id'";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Animal deleted")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error.")</script>';
							}
							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Animal ID not found")</script>';
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