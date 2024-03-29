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
  <a href="admin_home.php"><b>Home</b></a>
 
  <div class="dropdown">
    <button class="dropbtn">Visitors 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        
      <div class="row">
        <div class="column">
          <h3>Information</h3>
          <a href="admin_info.php">Info</a>
         </div>
        <div class="column">
          <h3>Visitors' Profile</h3>
          <a href="admin_vvisitor.php">View</a>
          <a href="admin_visitor.php">Edit</a>
          
        </div>
        
      </div>
    </div>
  </div> 
  
 <div class="dropdown">
    <button class="dropbtn">Administrative 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
         
      <div class="row">
        <div class="column">
          <h3>Posts</h3>
          <a href="admin_vposts.php">View</a>
          <a href="admin_posts.php">Edit</a>
        </div>
        <div class="column">
          <h3>Departments</h3>
          <a href="admin_vdepts.php">View</a>
          <a href="admin_depts.php">Edit</a>
        </div>
        <div class="column">
          <h3>Employees</h3>
          <a href="admin_vemployees.php">View</a>
          <a href="admin_employees.php">Edit</a>
        </div>
      </div>
    </div>
  </div> 
  
  <div class="dropdown">
    <button class="dropbtn">Animal Profiling 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
       
      <div class="row">
        <div class="column">
          <h3>Class Data</h3>
        	<a href="admin_vtypeof.php">View</a>
			<a href="admin_typeof.php">Edit</a>
        </div><div class="column">
          <h3>Species Data</h3>
        	<a href="admin_vspecies.php">View</a>
			<a href="admin_species.php">Edit</a>
        </div>
		<div class="column">
          <h3>Animal Data</h3>
			<a href="admin_vanimals.php">View</a>
			<a href="admin_animals.php">Edit</a>
        </div>
		<div class="column">
          <h3>Checkup Appointments'  Data</h3>
			<a href="admin_vcheckup.php">View</a>
			<a href="admin_checkup.php">Edit</a>
        </div>
		
      </div>
    </div>
  </div> 
  
  <div class="dropdown">
    <button class="dropbtn">Adopt & Donate 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        
      <div class="row">
        <div class="column">
          <h3>Transaction Details</h3>
          <a href="admin_vtransfer.php">View</a>
          <a href="admin_transfer.php">Edit</a>
        </div>
        <div class="column">
          <h3>Donor Details</h3>
          <a href="admin_vdonor.php">View</a>
          <a href="admin_donor.php">Edit</a>
        </div>
      </div>
    </div>
  </div> 
  <a href="cmn_home.php"><b>Logout</b></a>
</div>
<br><br>
	
</body>
<style>
body {
  background-image: url('img/forest.jpg');
  background-size: cover;
}

</style>
</html>


