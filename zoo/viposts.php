<?php
	session_start();
	require 'config/visitor_config.php';
	$post_id="";
	$post_title="";
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
			
		<form class="myform" action="viposts.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Post ID:</b></label>
					<input type="text" placeholder="Enter post ID" name="post_id"><br><br>
					<label><b>Post Title:</b>  </label>
					<input type="text" placeholder="Enter Post Title" name="post_title"><br><br>
				</center>
		</form>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL")</script>';
					
					$sql = "SELECT * FROM post order by post_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Post ID</font> </td> 
								<td> <font face="Arial">Post Title</font> </td>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["post_id"].'</td> 
									<td>'. $row["post_title"].'</td>								
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
					$post_id=$_POST['post_id'];
					$post_title=$_POST['post_title'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($post_id=="" && $post_title=="")
						{
							echo '<script type="text/javascript">alert("Both Fields cannot be empty")</script>';
						}
							
						else if($post_id!="" && $post_title!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Post Title and Post ID")</script>';	
							
							$sql = "SELECT * FROM post where post_title='$post_title' or post_id='$post_id'";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Post ID</font> </td> 
								<td> <font face="Arial">Post Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["post_id"].'</td> 
											<td>'. $row["post_title"].'</td> 
										</tr><br>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($post_id!="" && $post_title=="")
						{
							echo '<script type="text/javascript">alert("Search Based on Post ID")</script>';	
							
							$sql = "SELECT * FROM post where post_id='$post_id'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Post ID</font> </td> 
								<td> <font face="Arial">Post Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["post_id"].'</td> 
									<td>'. $row["post_title"].'</td>
					              </tr><br>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($post_id=="" && $post_title!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Post Title")</script>';	
							
							$sql = "SELECT * FROM post where post_title='$post_title'";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<td> <font face="Arial">Post ID</font> </td> 
								<td> <font face="Arial">Post Title</font> </td>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["post_id"].'</td> 
										<td>'. $row["post_title"].'</td>
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