<?php
	session_start();
	require 'config/visitor_config.php';
	$type_id="";
	$type_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>animals table</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div id="main_wrapper">
		<h2>Animals</h2>
			<?php
			echo '<script type="text/javascript">alert("ALL")</script>';
					
					$sql = "select type_name,specie_name,animal_name,dob,measurement,weight,age,gender,cage_no FROM animals,animal_species,species,specie_type,typeof where animals.animal_id=animal_species.animal_id and animal_species.specie_id=species.specie_id and species.specie_id=specie_type.specie_id and specie_type.type_id=typeof.type_id order by type_name";
						$result = $con->query($sql);
						echo '<table border="0" cellspacing="2" cellpadding="2"> 
								<tr> 
								<th> <font face="Arial">Class</font> </th> 
								<th> <font face="Arial">Specie</font> </th> 
								<th> <font face="Arial">Animal Name</font> </th>
								<th> <font face="Arial">D.O.B</font> </th>
								<th> <font face="Arial">Measurement</font> </th>
								<th> <font face="Arial">Weight</font> </th> 
								<th> <font face="Arial">Age</font> </th>
								<th> <font face="Arial">Gender</font> </th>
								<th> <font face="Arial">Cage Number</font> </th>
								</tr>';

						if ($result->num_rows > 0) 
						{
						// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo '<tr> 
									<td>'. $row["type_name"].'</td>
									<td>'. $row["specie_name"].'</td> 
									<td>'. $row["animal_name"].'</td>
									<td>'. $row["dob"].'</td>
									<td>'. $row["measurement"].'</td>
									<td>'. $row["weight"].'</td> 
									<td>'. $row["age"].'</td>
									<td>'. $row["gender"].'</td>
									<td>'. $row["cage_no"].'</td>									
					              </tr>';
								  
							}
							echo '<br><br>';
						} 
						else 
						{
						echo "<br><br>0 results";}
				
				
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