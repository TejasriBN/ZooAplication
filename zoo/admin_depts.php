<?php
	session_start();
	require 'config/admin_config.php';
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
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_depts.php" method="post">
			<center>
				<br>
				<label><b>Department ID:</b>  </label>
				<input type="text" placeholder="Enter Department ID" name="dept_id"><br><br>
				<label><b>Department Name:</b></label>
				<input type="text" placeholder="Enter Department Name" name="dept_name"><br><br>
				
				<br><br>
				
				<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
				<button id="btn_update" name="update_btn" type="submit">Update</button>
				<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
			</center>
		</form>
			
			<br><br><a href="admin_vdepts.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$dept_id=$_POST['dept_id'];
					$dept_name=$_POST['dept_name'];
					
					if($dept_id=="" || $dept_name=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the compulsory feilds")</script>';
					}
					else{
						$query = "select * from department where dept_id='$dept_id' or dept_name='$dept_name'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Department Alredy Exists")</script>';
						}
						else
						{
							$query = "insert into department values('$dept_id','$dept_name')";
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
					$dept_id=$_POST["dept_id"];
					$dept_name=$_POST['dept_name'];
					if($dept_id !="" && $dept_name !="")
					{
						echo '<script type="text/javascript">alert("Department Name for the given Department ID being changed")</script>';
						$query= "select * from department where dept_id='$dept_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update department SET dept_name='$dept_name' WHERE dept_id='$dept_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Department info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Department ID does not exist")</script>';
						}
					}
					
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['dept_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Department ID to delete")</script>';
					}
					else
					{
						$dept_id = $_POST['dept_id'];
						$query= "select * from department where dept_id='$dept_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this department.")</script>';
							$query = "delete from employee WHERE post_id in( select post_id from postdept where dept_id='$dept_id')";
							$query_run = mysqli_query($con,$query);
							$query = "delete from postdept WHERE dept_id='$dept_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from post WHERE post_id not in( select post_id from postdept)";
							$query_run = mysqli_query($con,$query);
							$query = "delete from department WHERE dept_id='$dept_id'";
							$query_run = mysqli_query($con,$query);
							
							echo '<script type="text/javascript">alert("Department Deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Department ID not found")</script>';
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