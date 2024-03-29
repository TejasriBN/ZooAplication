<?php
/*For My LocalPC*/
$con = mysqli_connect("localhost","root","") OR die("cannot connect");
mysqli_select_db($con,'zoo');
?>
<html>
<body><header><h1>&nbsp;eZoo</h1></header>
<hr style="height:5px;border-width:0;color:white;background-color:white">
<div class="navbar">
  <a href="visitor_home.php"><b>Home</b></a>
  <a href="visitor_about.php">About</a>
  
  <div class="dropdown">
    <button class="dropbtn">Visitors 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        
      <div class="row">
        <div class="column">
          <a href="visitor_info.php"><h3>Info Corner</h3></a>
          <a href="visitor_visitor.php"><h3>Ticket</h3></a>
         </div>       
      </div>
    </div>
  </div> 
 
 <a href="visitor_vanimals.php">Animals</a>
    
  <div class="dropdown">
    <button class="dropbtn">Adopt & Donate 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        
      <div class="row">
        <div class="column">
          <a href="visitor_transfer.php"><h3>Transaction Details</h3></a>
          <a href="visitor_donor.php"><h3>Donor Profile</h3></a>
        </div>
      </div>
    </div>
  </div> 
  <a href="visitor_FAQs.php">FAQ</a>
  <a href="cmn_home.php"><b>Logout</b></a>
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


