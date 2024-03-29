<?php
	session_start();
	require 'config/admin_config.php';
	$donor_id="";
	$aadhar_no='';
	$name='';
	$age='';
	$gender='';
	$address='';
	$phone='';
	$blood_group='';
	$dob = date("Y-m-d");
	$today = date("Y-m-d");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>donor table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Donor Data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_donor.php" method="post">
			<center>
				<br><br>
				<label><b>Donor ID:</b></label>
				<input type="text" placeholder="Enter Donor ID" name="donor_id"><br><br>
				<label><b>Aadhar Number:</b></label>
				<input type="text" placeholder="Enter Aadhar" name="aadhar_no"><br><br>
				<label><b>Name:</b>  </label>
				<input type="text" placeholder="Enter Name" name="name" ><br><br>
				<label><b>Date of Birth:</b>  </label>
				<input type="date" placeholder="Enter the DOB" name="dob" max=<?php echo $today?> ><br><br>
				<label><b>Age:</b>  </label>
				<input type="text" placeholder="Enter the Age" name="age" ><br><br>			
				<label><b>Gender:</b></label><br>
				<input name="gender" type="radio" class="radiobtns" value="" checked>None<br>
				<input name="gender" type="radio" class="radiobtns" value="male">Male<br>
				<input name="gender" type="radio" class="radiobtns" value="female">Female<br><br><br>
				<br><label><b>Address:</b>  </label>
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
				<input name="blood_group" type="radio" class="radiobtns" value="AB-">AB-<br><br>
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vdonor.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$donor_id=$_POST['donor_id'];
					$aadhar_no=$_POST['aadhar_no'];
					$name=$_POST['name'];
					$dob=$_POST['dob'];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$blood_group=$_POST['blood_group'];
					//echo "frge'$aadhar_no','$donor_id','$aadhar_no'|| '$name' || '$dob' || '$age' || '$gender' || '$address' || '$phone' || '$blood_group'";
					
					if($donor_id=='' || $aadhar_no=='' || $name=='' || $dob=='' || $age=='' || $gender=='' || $address=='' || $phone=='' || $blood_group=='' )
					{
						echo '<script type="text/javascript">alert("Insert values in all the feilds")</script>';
					}
					else
					{
						$query = "select * from donor where donor_id='$donor_id'";
							$query_run=mysqli_query($con,$query);
						//echo "frge'$aadhar_no','$donor_id'";
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Donor Alredy Exists")</script>';
						}
						
						else
						{
							
								$query = "select * from person where aadhar_no='$aadhar_no';";
								$query_run=mysqli_query($con,$query);
								if(mysqli_num_rows($query_run)>0)
								{
									echo '<script type="text/javascript">alert("Person Alredy Exists")</script>';
								}
								else
								{
									
									$query = "insert into person values('$aadhar_no','$name','$dob','$age','$gender','$address','$phone','$blood_group');";
									$query_run=mysqli_query($con,$query);
									if($query_run)
									{
										echo '<script type="text/javascript">alert("Person Inserted")</script>';
									}
									else
									{echo '<script type="text/javascript">alert("Error")</script>';}
								$query = "insert into donor values('$donor_id','$aadhar_no')";
									$query_run=mysqli_query($con,$query);
									if($query_run)
									{
										echo '<script type="text/javascript">alert("Donor Inserted")</script>';
									}
									else
									{echo '<script type="text/javascript">alert("Error")</script>';}
							
								}
								
							}
						}
					}
				
				else if(isset($_POST['update_btn']))
				{
					$donor_id=$_POST['donor_id'];
					$aadhar_no=$_POST['aadhar_no'];
					$name=$_POST['name'];
					$dob=$_POST['dob'];
					$age=$_POST['age'];
					$gender=$_POST['gender'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$blood_group=$_POST['blood_group'];
		
					if($donor_id!='' && $name!='' && $dob!='' && $age!='' && $gender!='' && $address!='' && $phone!='' && $blood_group!='' )
					{
						echo '<script type="text/javascript">alert("Donor Information being Updated")</script>';
						$query= "select * from donor where donor_id='$donor_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							//echo "frge'$aadhar_no','$donor_id','$aadhar_no'|| '$name' || '$dob' || '$age' || '$gender' || '$address' || '$phone' || '$blood_group'";
							$query = "update person set name='$name',dob='$dob',age='$age',gender='$gender',address='$address',phone='$phone',blood_group='$blood_group' where aadhar_no in( select aadhar_no from donor where donor_id='$donor_id')";
							$query_run=mysqli_query($con,$query);
							if($query_run)
									{
										echo '<script type="text/javascript">alert("Donor info Updated Successfully")</script>';
									}
									else
									{echo '<script type="text/javascript">alert("Error")</script>';}
								
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Donor ID does not exist")</script>';
						}
					}
					
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
					
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['donor_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Donor ID to delete")</script>';
					}
					else
					{
						$donor_id = $_POST['donor_id'];
						$query= "select * from donor where donor_id='$donor_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this Donor.")</script>';
							$query = "delete from transfer_donor WHERE donor_id='$donor_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from transfer WHERE transfer_id not in (select transfer_id from transfer_donor)";
							$query_run = mysqli_query($con,$query);
							$query = "delete from donor WHERE donor_id='$donor_id'";
							$query_run = mysqli_query($con,$query);
							echo '<script type="text/javascript">alert("Donor info deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Donor ID not found")</script>';
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