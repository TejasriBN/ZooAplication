<?php
	session_start();
	require 'config/visitor_config.php';
?>
<!DOCTYPE html>
<html>
<style>



</style>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<br>
<body>

<div class="text_wrapper">
	<center>
		<h2><u> FAQs </u></h2>
	</center>
	
	
		The following project is a detailed and sophisticated demonstration of the kind of database one may find being used at zoos around the world. It has been
		designed to keep track of various information, such as the kinds of animals safeguarded at the zoo, details of all people employed at the zoo, the kind of
		funding on which the zoo operates, etc. 
		<br><br>
		The development of this project began on the 4th of January, with the creation of a relevant ER diagram, to help understand the information to be stored,
		and the relationships between all this information. As our understanding of databases deepened, the ER diagram was modified to better represent the structure
		of the required database, and improve on its data handling abilities.  
		<br><br>
		Following this, we were able to formulate a Relational Model of the ER diagram, and systematically fill data in each table as necessary. It was done with the
		purpose of determining and finalizing the relationships between each table. It also made it possible to implement a logical structure upon the data, as
		required by these relationships. This further improved our understanding of the scale of the project. 
		<br><br>
		Finally, upon introducing data into the tables, we were able to apply the rules of Normalization in order to reduce data redundancy and improve data integrity.
		This streamlined data retrieval processes, and has led to a significantly more professional database. Upon normalization, the database will take less time to
		retrieve data, will be lag friendly, and help us design a more friendly user-interface. The normalized database is free of all insertion, update and delete anomalies,
		which is an extremely desirable feature, especially for large-scale databases such as this. It also prevents all forms of data duplication, which saves valuable
		space on servers, permitting the storage of more data. 
		<br><br>
		All information made available by the user is stored on a database making use of Oracle SQL, and is presented by making use of a front-end application developed
		on PHP, which is a general-purpose scripting language. PHP is often embedded in HTML for ease of use, such as in this project. The application is hosted on the
		computer’s local host, which is set up by means of the XAMPP software.	
	
</div>
</body>
</html>