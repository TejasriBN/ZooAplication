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
<title>visit table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		<h2>Visit Data</h2>
			
		<form class="myform" action="admin_vvisitor.php" method="post">
			
			<h3>Select the action to be performed</h3>
				<center>
					<button id="btn_all" name="all_btn" type="submit">Display All Records in the Table</button>
					<button id="btn_find" name="find_btn" type="submit">Select Records to Display</button><br><br>
					<label><b>Visit ID:</b></label>
					<input type="text" placeholder="Enter Visit ID" name="visit_id"><br><br>
					<label><b>Date:</b>  </label>
					<input type="date" placeholder="Enter the Date" name="date_v" max=<?php echo $today?> ><br><br>
				</center>
			</form>
			<a href="admin_visitor.php"><button id="btn_edit" name="edit_btn" type="submit" href="visitor.php">Edit</button></a>
			
			<?php
			
				if(isset($_POST['all_btn']))
				{
					echo '<script type="text/javascript">alert("ALL Records displayed.")</script>';
					
					$sql = "SELECT * FROM visit order by visit_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Visit ID</font> </th> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">In Time</font> </th>
								<th> <font face="Arial">Out Time<font> </th>
								<th> <font face="Arial">Adult</font> </th>
								<th> <font face="Arial">Child</font> </th>
								<th> <font face="Arial">Camera</font> </th>
								<th> <font face="Arial">Mobiles</font> </th>
								<th> <font face="Arial">Bill</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["visit_id"].'</td>
									<td>'. $row["date_v"].'</td>
									<td>'. $row["itime"].'</td>
									<td>'. $row["otime"].'</td> 
									<td>'. $row["adult"].'</td>
									<td>'. $row["child"].'</td>
									<td>'. $row["camera"].'</td>
									<td>'. $row["mobile"].'</td>
									<td>'. $row["bill"].'</td>
									</tr>';
								  
							}
							echo '<br><br></table>';
						} 
						else 
						{
						echo "<br><br>0 results";}
				}
				
				if(isset($_POST['find_btn']))
				{
					$visit_id=$_POST['visit_id'];
					$date_v=$_POST['date_v'];
					echo '<script type="text/javascript">alert("Searching!!")</script>';
					
					if($visit_id=="" && $date_v=='')
						{
							echo '<script type="text/javascript">alert("Enter any one of the values")</script>';
						}
							
					else if($visit_id!="")
						{
							echo '<script type="text/javascript">alert("Search Based on Visit ID")</script>';	
							
							$sql = "SELECT * FROM visit where visit_id='$visit_id' order by visit_id";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Visit ID</font> </th> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">In Time</font> </th>
								<th> <font face="Arial">Out Time<font> </th>
								<th> <font face="Arial">Adult</font> </th>
								<th> <font face="Arial">Child</font> </th>
								<th> <font face="Arial">Camera</font> </th>
								<th> <font face="Arial">Mobiles</font> </th>
								<th> <font face="Arial">Bill</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["visit_id"].'</td>
									<td>'. $row["date_v"].'</td>
									<td>'. $row["itime"].'</td>
									<td>'. $row["otime"].'</td> 
									<td>'. $row["adult"].'</td>
									<td>'. $row["child"].'</td>
									<td>'. $row["camera"].'</td>
									<td>'. $row["mobile"].'</td>
									<td>'. $row["bill"].'</td>
								</tr>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
						}
						else if($date_v!='')
						{		
							$sql = "SELECT * FROM visit where date_v>='$date_v' order by date_v";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Date</font> </th>
								<th> <font face="Arial">Visit ID</font> </th> 
								<th> <font face="Arial">In Time</font> </th>
								<th> <font face="Arial">Out Time<font> </th>
								<th> <font face="Arial">Adult</font> </th>
								<th> <font face="Arial">Child</font> </th>
								<th> <font face="Arial">Camera</font> </th>
								<th> <font face="Arial">Mobiles</font> </th>
								<th> <font face="Arial">Bill</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["date_v"].'</td>
									<td>'. $row["visit_id"].'</td>
									<td>'. $row["itime"].'</td>
									<td>'. $row["otime"].'</td> 
									<td>'. $row["adult"].'</td>
									<td>'. $row["child"].'</td>
									<td>'. $row["camera"].'</td>
									<td>'. $row["mobile"].'</td>
									<td>'. $row["bill"].'</td>
									</tr>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
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