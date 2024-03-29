<?php
	session_start();
	require 'config/admin_config.php';
	$transfer_id="";
	$donor_id="";
	$amount=0;
	$purpose="";
	$aadhar_no='';
	$date_t = date("Y-m-d");
	$today = date("Y-m-d");
	$name='';
	$dob='';
	$age='';
	$gender='';
	$address='';
	$phone='';
	$blood_group='';
	?>
<!DOCTYPE html>
<html>
<head>
<title>transfer transaction table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Transfer Data</h2>
			<h3>Select the action to be performed</h3>
			
			
		<form class="myform" action="admin_transfer.php" method="post">
			<center>
				<br><br>
				<label><b>Transfer ID:</b>  </label>
				<input type="text" placeholder="Enter Transfer ID" name="transfer_id"><br><br>
				<label><b>Donor ID:</b></label>
				<input type="text" placeholder="Enter Donor ID" name="donor_id"><br><br>
				<label><b>Date:</b>  </label>
				<input type="date" placeholder="Enter the Date of Transfer" name="date_t" max=<?php echo $today?>><br><br>
				<label><b>Amount:</b>  </label>
				<input type="number" placeholder="Enter the Amount Transfered" name="amount" step="0.1"><br><br>
				<label><b>Purpose:</b>  </label>
				<input type="text" placeholder="Enter the Purpose" name="purpose"><br><br>
				
				<br><br>
					<button id="btn_insert" name="insert_btn" type="submit">Insert</button>
					<button id="btn_update" name="update_btn" type="submit">Update</button>
					<button id="btn_delete" name="delete_btn" type="submit">Delete</button>
				</center>
			</form>
			
			<br><br><a href="admin_vtransfer.php"><input name='view' type="submit" id="view_btn" value="View"/>
			
		<?php
			
			if(isset($_POST['insert_btn']))
			{
					$transfer_id=$_POST["transfer_id"];
					$donor_id=$_POST['donor_id'];
					$amount=$_POST['amount'];
					$date_t=$_POST['date_t'];
					$purpose=$_POST['purpose'];
					
					
					//echo "'$transfer_id'&& '$donor_id' && '$amount' && '$date_t' && '$purpose'";
					
					if($transfer_id==''&& $donor_id=='' && $amount=='' && $date_t=='' && $purpose=='')
					{
						echo '<script type="text/javascript">alert("Insert values in all the feilds")</script>';
					}
					else
					{
						$query = "select * from transfer where transfer_id='$transfer_id'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Transaction Alredy Exists")</script>';
						}
						else
						{
							$query = "select * from donor where donor_id='$donor_id'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								$query = "insert into transfer values('$transfer_id','$date_t','$amount','$purpose')";
								$query_run=mysqli_query($con,$query);
								$query = "insert into transfer_donor values('$transfer_id','$donor_id');";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									echo '<script type="text/javascript">alert("Values Inserted Successfully")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error.Donor doesnt exist")</script>';
								}
							}
						}
					}
							
							
			}
										
			else if(isset($_POST['update_btn']))
				{
					$transfer_id=$_POST["transfer_id"];
					$donor_id=$_POST['donor_id'];
					$amount=$_POST['amount'];
					$date_t=$_POST['date_t'];
					$purpose=$_POST['purpose'];
					
		
					if($transfer_id!='' && $amount!='' && $date_t!='' && $purpose!='')
					{
						
						echo '<script type="text/javascript">alert("Transaction info for the given Transfer ID being changed")</script>';
						$query= "select * from transfer where transfer_id='$transfer_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$query = "update transfer SET date_t='$date_t',amount='$amount',purpose='$purpose' WHERE transfer_id='$transfer_id'";
							$query_run=mysqli_query($con,$query);							
							echo '<script type="text/javascript">alert("Transfer info Updated Successfully")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Transfer ID does not exist")</script>';
						}
						
					}
					else 
					{
						echo '<script type="text/javascript">alert("Enter values in Required columns")</script>';
					}
				}
				
				
				else if(isset($_POST['delete_btn']))
				{
					if($_POST['transfer_id']=="")
					{
						echo '<script type="text/javascript">alert("Enter Transfer ID to delete")</script>';
					}
					else
					{
						$transfer_id = $_POST['transfer_id'];
						$query= "select * from transfer where transfer_id='$transfer_id'";
						$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("You are about to delete all information regarding this Transaction.")</script>';
							$query = "delete from transfer_donor WHERE transfer_id='$transfer_id'";
							$query_run = mysqli_query($con,$query);
							$query = "delete from transfer WHERE transfer_id='$transfer_id'";
							$query_run = mysqli_query($con,$query);
							
							echo '<script type="text/javascript">alert("Transaction deleted")</script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Transfer ID not found")</script>';
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