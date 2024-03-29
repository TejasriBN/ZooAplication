<?php
	session_start();
	require 'config/admin_config.php';
	$transfer_id="";
	$donor_id="";
	$amount=0;
	$purpose="";
	$date_t = date("Y-m-d");
	$today = date("Y-m-d");
	$name='';
	$dob='';
	$age='';
	$gender='';
	$address='';
	$phone='';
	$blood_group='';
	$aadhar='';
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
			
		<form class="myform" action="admin_vtransfer.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Transfer ID:</b>  </label>
					<input type="text" placeholder="Enter Transfer ID" name="transfer_id"><br><br>
					<label><b>Donor ID:</b></label>
					<input type="text" placeholder="Enter Donor ID" name="donor_id"><br><br>
					<label><b>Date:</b>  </label>
					<input type="date" placeholder="Enter the Date of Transfer" name="date_t" max=<?php echo $today?>><br><br>
					<label><b>Amount:</b>  </label>
					<input type="number" placeholder="Enter the Amount Transfered" name="amount" step="0.1"><br><br>
									
				</center>
			</form>
			<a href="admin_transfer.php"><button id="btn_edit" name="edit_btn" type="submit" href="transfer.php">Edit</button></a>
			
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed")</script>';
					
					$sql = "SELECT transfer.transfer_id, date_t,amount,purpose,donor_id FROM transfer inner join transfer_donor on transfer.transfer_id=transfer_donor.transfer_id order by transfer.transfer_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Transfer ID</font> </th> 
								<th> <font face="Arial">Donor ID</font> </th>
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">Amount</font> </th>
								<th> <font face="Arial">Purpose</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["transfer_id"].'</td> 
									<td>'. $row["donor_id"].'</td>
									<td>'. $row["date_t"].'</td>
									<td>'. $row["amount"].'</td>
									<td>'. $row["purpose"].'</td> 
								</tr>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
				}
				
				if(isset($_POST['find_btn']))
				{
					$transfer_id=$_POST['transfer_id'];
					$donor_id=$_POST['donor_id'];
					$date_t=$_POST['date_t'];
					$amount=$_POST['amount'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
						if($transfer_id=="" && $donor_id=="" && $date_t=='' && $amount=='')
						{
							echo '<script type="text/javascript">alert("All Fields cannot be empty")</script>';
						}
							
						else if($transfer_id!="" && $donor_id=="" && $date_t=='' && $amount=='')
						{
							echo '<script type="text/javascript">alert("Search Based on Transfer ID")</script>';	
							
							$sql = "SELECT * FROM transfer where transfer_id='$transfer_id' order by transfer_id";
							$result = $con->query($sql);
							

							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Transfer ID</font> </th> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">Amount</font> </th>
								<th> <font face="Arial">Purpose</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
											<td>'. $row["transfer_id"].'</td> 
											
											<td>'. $row["date_t"].'</td>
											<td>'. $row["amount"].'</td>
											<td>'. $row["purpose"].'</td> 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($transfer_id=="" && $donor_id=="" && $date_t!='' && $amount=='')
						{
							echo '<script type="text/javascript">alert("Search Based on Date")</script>';	
							
							$sql = "SELECT * FROM transfer where date_t>='$date_t' order by date_t";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">Transfer ID</font> </th>
								<th> <font face="Arial">Amount</font> </th>
								<th> <font face="Arial">Purpose</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["date_t"].'</td>
									<td>'. $row["transfer_id"].'</td> 
									<td>'. $row["amount"].'</td>
									<td>'. $row["purpose"].'</td> 						
					              </tr>';
								  
							}
							echo '<br><br>';
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($transfer_id=="" && $donor_id=="" && $date_t=='' && $amount!='')
						{
							echo '<script type="text/javascript">alert("Search Based on Amount")</script>';	
							
							$sql = "SELECT * FROM transfer where amount>='$amount' order by amount";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Transfer ID</font> </th> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">Amount</font> </th>
								<th> <font face="Arial">Purpose</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["transfer_id"].'</td> 
										<td>'. $row["date_t"].'</td>
										<td>'. $row["amount"].'</td>
										<td>'. $row["purpose"].'</td> 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else if($transfer_id=="" && $donor_id!="" && $date_t=='' && $amount=='')
						{
							echo '<script type="text/javascript">alert("Search Based on Donor")</script>';	
							
							$sql = "SELECT donor_id,transfer.transfer_id,date_t,amount,purpose FROM transfer inner join transfer_donor on transfer.transfer_id=transfer_donor.transfer_id where donor_id='$donor_id' order by donor_id";
							$result = $con->query($sql);
							echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Donor ID</font> </th>
								<th> <font face="Arial">Transfer ID</font> </th>
								<th> <font face="Arial">Date</font> </th>								
								<th> <font face="Arial">Amount</font> </th>
								<th> <font face="Arial">Purpose</font> </th>
								</tr>';

							if ($result->num_rows > 0) 
							{
							// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo '<tr> 
										<td>'. $row["donor_id"].'</td>
										<td>'. $row["transfer_id"].'</td> 
										<td>'. $row["date_t"].'</td>
										<td>'. $row["amount"].'</td>
										<td>'. $row["purpose"].'</td> 
										</tr>';
								  
								}
							} 
							else 
							{
							echo "<br><br>0 results";
							}
						}
						else
						{echo '<script type="text/javascript">alert("ERROR")</script>';}
						
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