<?php
	session_start();
	require 'config/admin_config.php';
	$post_id="";	
	$post_title="";
	$dept_id="";
	$dept_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>posts table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Posts data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_posts.php" method="post">
			<label><b>Department Name:</b></label>
			<select name="deptid">
			<option value="">---Select---</option>
			<?php
				$query = "SELECT * FROM department order by dept_id";
				$query_run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($query_run)) 
				{
					$dept_id=$row['dept_id'];
					$dept_name=$row['dept_name'];
					echo "<option value='".$dept_id."'>$dept_name</option>";
				}
			?>
			</select>
			<center>
				<br><br>
				<label><b>Post ID:</b>  </label>
				<input type="text" placeholder="Enter Post ID" name="post_id"><br><br>
				<label><b>Post Title:</b></label>
				<input type="text" placeholder="Enter Post Title" name="post_title"><br><br>
				
				<br><br>
				
				<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
				<button id="btn_update" name="update_btn" type="submit">Update</button>
				<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
			</center>
		</form>
			
			<br><br><a href="admin_vposts.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$dept_id=$_POST["deptid"];
					$post_id=$_POST['post_id'];
					$post_title=$_POST['post_title'];
					
					if($dept_id=="" || $post_id=="" || $post_title=="")
					{
						echo '<script type="text/javascript">alert("Insert values in the compulsory feilds")</script>';
					}
					else{
						$query = "select * from post where post_id='$post_id' or post_title='$post_title'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Post Alredy Exists")</script>';
						}
						else
						{
							$query = "insert into post values('$post_id','$post_title')";
							$query_run=mysqli_query($con,$query);
							$query = "insert into postdept values('$post_id','$dept_id');";
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
					$dept_id=$_POST["deptid"];
					$post_id=$_POST['post_id'];
					$post_title=$_POST['post_title'];
					if($dept_id !="" && $post_id !="" && $post_title =="")
					{
						echo '<script type="text/javascript">alert("Department ID for the given Post ID being changed")</script>';
						$query= "select * from post where post_id='$post_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update postdept SET dept_id='$dept_id' WHERE post_id='$post_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Post info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Post ID does not exist")</script>';
						}
					}
					else if($dept_id =="" && $post_id !="" && $post_title!="")
					{
						
						echo '<script type="text/javascript">alert("Post Title for the given Post ID being changed")</script>';
						$query= "select * from post where post_id='$post_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update post SET post_title='$post_title' WHERE post_id='$post_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Post Renamed Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Post ID does not exist")</script>';
						}
						
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['post_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Post ID to delete")</script>';
					}
					else
					{
						$post_id = $_POST['post_id'];
						$query= "select * from post where post_id='$post_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this post.")</script>';
							$query = "delete from employee WHERE post_id='$post_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from postdept WHERE post_id='$post_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from post WHERE post_id='$post_id'";
							$query_run = mysqli_query($con,$query);
							
							echo '<script type="text/javascript">alert("Post Deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Post ID not found")</script>';
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