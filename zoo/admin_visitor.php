<?php
	session_start();
	require 'config/admin_config.php';
	$visit_id="";
	$adult=1;
	$child=0;
	$bill=0;
	$date_v = date("Y-m-d");
	$today = date("Y-m-d");
	$cams=0;
	$mobiles=0;
?>
<!DOCTYPE html>
<html>
<head>
<title>visitors table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Visitor Data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_visitor.php" method="post">
			<center>
				<br><br>
				<label><b>Visit ID:</b></label>
				<input type="text" placeholder="Enter Visit ID" name="visit_id"><br><br>
				<label><b>Date:</b>  </label>
				<input type="date" placeholder="Enter the Date" name="date_v" max=<?php echo $today?> ><br><br>
				<label><b>In Time:</b>  </label>
				<input type="time" placeholder="Enter the In Time" name="itime" max="17:00" min="09:00" ><br><br>	
				<label><b>Out Time:</b>  </label>
				<input type="time" placeholder="Enter the Out Time" name="otime" max="18:00" min="09:00" ><br><br>				
				<label><b>Adults:</b>  </label>
				<input type="number" placeholder="Enter number of Adults" name="adult" min="1"><br><br>
				<label><b>Children:</b>  </label>
				<input type="number" placeholder="Enter number of Children" name="child"><br><br>
				<label><b>Cameras:</b>  </label>
				<input type="number" placeholder="Enter number of Cameras" name="cams" ><br><br>
				<label><b>Mobiles:</b>  </label>
				<input type="number" placeholder="Enter number of Mobiles" name="mobiles" ><br><br>
				
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vvisitor.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$visit_id=$_POST['visit_id'];
					$date_v=$_POST['date_v'];
					$itime=$_POST['itime'];
					$otime=$_POST['otime'];
					$adult=$_POST['adult'];
					$child=$_POST['child'];
					$cams=$_POST['cams'];
					$mobiles=$_POST['mobiles'];
					//echo "adult '$adult',child '$child',camera '$cams',mob '$mobiles'";
					
									
					if($visit_id=='' || $date_v=='' || $itime=='' || $adult=='')
					{
						echo '<script type="text/javascript">alert("Insert values in the required feilds")</script>';
					}
					else
					{
						$bill=(100*$adult)+(50*$child)+(50*$cams)+(25*$mobiles);
						$query = "select * from visit where visit_id='$visit_id'";
							$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Visit information Alredy Exists")</script>';
						}
						else
						{					
								$query = "insert into visit values('$visit_id','$date_v','$itime','$otime','$adult','$child','$cams','$mobiles','$bill')";
								$query_run=mysqli_query($con,$query);
								
								if($query_run)
								{
									echo '<script type="text/javascript">alert("Values Inserted Successfully.")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error in Inserting")</script>';
								}
								
							}
						}
					}
				
				else if(isset($_POST['update_btn']))
				{
					$visit_id=$_POST['visit_id'];
					$date_v=$_POST['date_v'];
					$itime=$_POST['itime'];
					$otime=$_POST['otime'];
					$adult=$_POST['adult'];
					$child=$_POST['child'];
					$cams=$_POST['cams'];
					$mobiles=$_POST['mobiles'];
					
		
					if($visit_id!='' && $date_v!='' && $itime!='' && $otime!='' && $mobiles!='' && $adult!='' && $child!='' && $cams!='')
					{
						$bill=(100*$adult)+(50*$child)+(50*$cams)+(25*$mobiles);echo '<script type="text/javascript">alert("Visit Information being Updated")</script>';
						$query= "select * from visit where visit_id='$visit_id'";
						
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update visit set date_v='$date_v',itime='$itime',otime='$otime',adult='$adult',child='$child',mobile='$mobiles',camera='$cams',bill='$bill' where visit_id='$visit_id'";
							$query_run=mysqli_query($con,$query);
							if($query_run)
								{
									echo '<script type="text/javascript">alert("Visit info Updated Successfully")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error in Updating")</script>';
								}							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Visit ID does not exist")</script>';
						}
					}
					else if($visit_id!='' && $date_v=='' && $itime=='' && $otime!='' && $mobiles=='' && $adult=='' && $child=='' && $cams=='')
					{
						echo '<script type="text/javascript">alert("Out-Time being Updated")</script>';
						$query= "select * from visit where visit_id='$visit_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update visit set otime='$otime' where visit_id='$visit_id'";
							$query_run=mysqli_query($con,$query);
							if($query_run)
								{
									echo '<script type="text/javascript">alert("Out-Time Updated Successfully")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error in Updating")</script>';
								}							
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Visit ID does not exist")</script>';
						}
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['visit_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Visit ID to delete")</script>';
					}
					else
					{
						$visit_id = $_POST['visit_id'];
						$query= "select * from visit where visit_id='$visit_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this Visit.")</script>';
							$query = "delete from visit WHERE visit_id='$visit_id'";
							$query_run = mysqli_query($con,$query);
							if($query_run)
								{
									echo '<script type="text/javascript">alert("Visit info deleted")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error in deleting")</script>';
								}
								
						}
						else
						{
							echo '<script type="text/javascript">alert("Visit ID not found")</script>';
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