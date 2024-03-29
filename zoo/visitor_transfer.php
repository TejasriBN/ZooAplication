<?php
	session_start();
	require 'config/visitor_config.php';
	$transfer_id="";
	$donor_id="";
	$amount=0;
	$purpose="";
	$date_t = date("Y-m-d");
	$today = date("Y-m-d");
	
	?>
<!DOCTYPE html>
<html>
<head>
<title>donation</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		
			<h2>Donation</h2>
			<h3>Enter the following Details</h3>
			
			
		<form class="myform" action="visitor_transfer.php" method="post">
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
					<button id="btn_insert" name="insert_btn" type="submit">Confirm</button>
				</center>
			</form>
			
			
			
			
		<?php
			if(isset($_POST['insert_btn']))
			{
					$transfer_id=$_POST["transfer_id"];
					$donor_id=$_POST['donor_id'];
					$amount=$_POST['amount'];
					$date_t=$_POST['date_t'];
					$purpose=$_POST['purpose'];
					
					
					//echo "'$transfer_id'&& '$donor_id' && '$amount' && '$date_t' && '$purpose'";
					
					if($transfer_id==''|| $donor_id=='' || $amount=='' || $date_t=='' || $purpose=='')
					{
						echo '<script type="text/javascript">alert("Insert values in all the feilds")</script>';
					}
					else
					{
						$query = "select * from transfer where transfer_id='$transfer_id'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("Transaction Already Exists")</script>';
						}
						else
						{
							$query = "select * from donor where donor_id='$donor_id'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								$query = "insert into transfer values('$transfer_id','$date_t','$amount','$purpose')";
								$query_run=mysqli_query($con,$query);
								$query = "insert into transfer_donor values('$transfer_id','$donor_id')";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									echo '<script type="text/javascript">alert("Values Inserted Successfully")</script>';
								}
								else
								{
									echo '<script type="text/javascript">alert("Error in inserting")</script>';
								}
							}
							else
								{
									echo '<script type="text/javascript">alert("Error. Donor doesn\'t exist")</script>';
								}
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