<?php
/*For My LocalPC*/
$con = mysqli_connect("localhost","root","") OR die("cannot connect");
mysqli_select_db($con,'zoo');
?>
<html>
<body>
<header><h1>&nbsp;eZoo</h1></header>
<hr style="height:5px;border-width:0;color:white;background-color:white">
<div class="navbar">
  <a href="cmn_home.php"><b>Home</b></a>
  <a href="cmn_about.php">About</a>
  <a href="cmn_FAQs.php">FAQ</a>
  <a href="cmn_login.php">Login</a>
</div>
<br>
	
</body>
<style>
body {
  background-image: url('img/forest.jpg');
  background-size: cover;
}

</style>
</html>


