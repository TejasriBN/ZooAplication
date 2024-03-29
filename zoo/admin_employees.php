<?php
	session_start();
	require 'config/admin_config.php';
	$emp_id="";
	$aadhar_no="";	
	$post_id="";
	$education="";
	$experience=0;
	$health_bg="";
	$name="";
	$dob=date("Y-m-d");
	$age=0;
	$gender="";
	$address="";
	$Phone="";
	$blood_group="";
	$today = date("Y-m-d");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Employee Data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_employees.php" method="post">
			<label><b>Post ID:</b></label>
			<select name="post_id">
			<option value="">---Select---</option>
			<?php
				$query = "SELECT post_id FROM post order by post_id";
				$query_run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($query_run)) 
				{
					$post_id=$row['post_id'];
					echo "<option value='".$post_id."'>$post_id</option>";
				}
				?>
			</select>
			<center>
				<br><br>
				<label><b>Aadhar Number:</b>  </label>
				<input type="text" placeholder="Enter Aadhar Number" name="aadhar_no"><br><br>
				<label><b>Employee ID:</b></label>
				<input type="text" placeholder="Enter Employee ID" name="emp_id"><br><br>
				<label><b>Education:</b>  </label>
				<input type="text" placeholder="Enter Education Qualifications" name="education"><br><br>
				<label><b>Experience:</b>  </label>
				<input type="number" placeholder="Enter Years of Experience" name="experience"><br><br>
				<label><b>Health Background:</b>  </label>
				<input type="text" placeholder="Enter Health background" name="health_bg"><br><br>
				<label><b>Name:</b>  </label>
				<input type="text" placeholder="Enter Name" name="name" ><br><br>
				<label><b>Date of Birth:</b>  </label>
				<input type="date" placeholder="Enter the DOB" name="dob" max=<?php echo $today?>><br><br>
				<label><b>Age:</b>  </label>
				<input type="number" placeholder="Enter the Age" name="age" ><br><br>			
				
				<label><b>Gender:</b></label><br>
				<input name="gender" type="radio" class="radiobtns" value="" checked>None<br>
				<input name="gender" type="radio" class="radiobtns" value="male">Male<br>
				<input name="gender" type="radio" class="radiobtns" value="female">Female<br><br>
				
				<label><b>Address:</b>  </label>
				<input type="text" placeholder="Enter Address" name="address" ><br><br>
				<label><b>Phone:</b>  </label>
				<input type="text" placeholder="Enter Phone Number" name="phone" ><br><br>
				
				<label><b>Blood Group:</b></label><br>
				<input name="blood_group" type="radio" class="radiobtns" value="A+" checked>A+
				<input name="blood_group" type="radio" class="radiobtns" value="A-">A-<br>
				<input name="blood_group" type="radio" class="radiobtns" value="B+">B+
				<input name="blood_group" type="radio" class="radiobtns" value="B-">B-<br>
				<input name="blood_group" type="radio" class="radiobtns" value="O+">O+
				<input name="blood_group" type="radio" class="radiobtns" value="O-">O-<br>
				<input name="blood_group" type="radio" class="radiobtns" value="AB+">AB+
				<input name="blood_group" type="radio" class="radiobtns" value="AB-">AB-<br>
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vemployees.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$emp_id=$_POST['emp_id'];
					$aadhar_no=$_POST['aadhar_no'];
					$post_id=$_POST['post_id'];
					$education=$_POST['education'];
					$experience=$_POST['experience'];
					$health_bg=$_POST['health_bg'];
					$name=$_POST['name'];
					$dob=$_POST['dob'];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$blood_group=$_POST['blood_group'];
					
					if($post_id=="" || $aadhar_no=="" || $emp_id=="" || $education=="" || $experience=="" || $health_bg=="" || $name=="" || $dob=="" || $age=="" || $gender=="" || $address=="" || $phone=="" || $blood_group=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the all fields")</script>';
					}
					else{
						$query = "select * from employee where emp_id='$emp_id' or aadhar_no='$aadhar_no'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Employee Already Exists")</script>';
						}
						else
						{
						
							$query = "select * from person where aadhar_no='$aadhar_no'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								$query = "insert into employee values('$emp_id','$aadhar_no','$post_id','$education','$experience','$health_bg')";
							$query_run=mysqli_query($con,$query);
							}
							else{
								$query = "insert into employee values('$emp_id','$aadhar_no','$post_id','$education','$experience','$health_bg')";
								$query_run=mysqli_query($con,$query);
								$query = "insert into person values('$aadhar_no','$name','$dob','$age','$gender','$address','$phone','$blood_group');";
								$query_run=mysqli_query($con,$query);
							}
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
					$emp_id=$_POST["emp_id"];
					$aadhar_no=$_POST['aadhar_no'];
					$post_id=$_POST['post_id'];
					$education=$_POST['education'];
					$experience=$_POST['experience'];
					$health_bg=$_POST['health_bg'];
					$name=$_POST['name'];
					$dob=$_POST['dob'];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$blood_group=$_POST['blood_group'];
					
					//echo "emp '$emp_id', post '$post_id','$aadhar_no'&& '$education' && '$experience' && '$health_bg' && '$name' && '$dob' && '$age' && '$gender' && '$address' && '$phone'";
					
					if($emp_id!="" && $post_id!="" && $aadhar_no=="" && $education=="" && $experience=="" && $health_bg=="" && $name=="" && $dob=="" && $age=="" && $gender=="" && $address=="" && $phone=="" )
					{
						echo '<script type="text/javascript">alert("Employee being moved to new post")</script>';
						$query= "select * from employee where emp_id='$emp_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update employee SET post_id='$post_id' WHERE emp_id='$emp_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Employee Transferred Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Employee ID does not exist")</script>';
						}
					}
					else if($emp_id!="" && $post_id=="" && $aadhar_no=="" && $education!="" && $experience!="" && $health_bg!="" && $name=="" && $dob=="" && $age=="" && $gender=="" && $address=="" && $phone=="" )
					{
						
						echo '<script type="text/javascript">alert("Employee Education Data Updating")</script>';
						$query= "select * from employee where emp_id='$emp_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update employee SET education='$education',experience='$experience',health_bg='$health_bg' WHERE emp_id='$emp_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Education info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Employee ID does not exist")</script>';
						}
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['emp_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Employee ID to delete")</script>';
					}
					else
					{
						$emp_id = $_POST['emp_id'];
						$query= "select * from employee where emp_id='$emp_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this employee.")</script>';
							$query = "delete from employee WHERE emp_id='$emp_id'";
							$query_run = mysqli_query($con,$query);
							
							echo '<script type="text/javascript">alert("Employee deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Employee ID not found")</script>';
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