<?php
	session_start();
	require 'config/visitor_config.php';
	$adult=1;
	$child=0;
	$bill=0;
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
		<h2>Ticket</h2>
			
		<form class="myform" action="visitor_visitor.php" method="post">
			
			
				<center>
					
					<label><b>Adults:</b>  </label>
					<input type="number" placeholder="Enter number of Adults" name="adult" min="1"><br><br>
					<label><b>Children:</b>  </label>
					<input type="number" placeholder="Enter number of Children" name="child" ><br><br>
					<label><b>Cameras:</b>  </label>
					<input type="number" placeholder="Enter number of Cameras" name="cams" ><br><br>
					<label><b>Mobiles:</b>  </label>
					<input type="number" placeholder="Enter number of Mobiles" name="mobiles" ><br><br>
					<button id="btn_all" name="all_btn" type="submit">Calculate</button>			
				</center>
			</form>
			<?php
			
				if(isset($_POST['all_btn']))
				{
					$adult=$_POST['adult'];
					$child=$_POST['child'];
					$cams=$_POST['cams'];
					$mobiles=$_POST['mobiles'];
					$bill=100*$adult+50*$child+50*$cams+25*$mobiles;
					echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Adults</font> </th> 
								<th> <font face="Arial">Child</font> </th> 
								<th> <font face="Arial">Mobiles</font> </th>
								<th> <font face="Arial">Camera</font> </th>
								<th> <font face="Arial">Bill</font> </th>
								</tr>
								<tr> 
									<td>'. $adult.'</td>
									<td>'. $child.'</td> 
									<td>'. $mobiles.'</td>
									<td>'. $cams.'</td>
									<td>'. $bill.'</td>
									</tr>';
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