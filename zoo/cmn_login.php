<?php
	session_start();
	require 'config/common_config.php';
	$type_id="";
	$type_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<br>
<center>
	<div class="text_wrapper">
			<h2>Login</h2>
			<center>
					<a  href="visitor_home.php"><button id="btn_visitor" name="visitor_btn" type="submit">Visitor</button></a><br><br><br><br>
					<form class="myform" action="cmn_login.php" method="post">
					<label>Password:</label>
					<input name="password" type="password" class="inputvalues" placeholder="Type your Password"/><br><br>
					<button id="btn_admin" name="admin_btn" type="submit">Admin</button>
					
			</center>		
			<?php if(isset($_POST['admin_btn']) && $_POST['password']=='123abc')
			{
				header('location:admin_home.php');}?>
			</form>		
		
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