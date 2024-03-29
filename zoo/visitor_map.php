<?php
	session_start();
	require 'config/visitor_config.php';
?>

<!DOCTYPE html>

<html>

<head>

	<title>Map</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		p{
			font-size:12px;
			font-family: Arial, Helvetica, sans-serif;
		}
		span{
			max-width:250px;
			position: absolute;
			padding:10px;
			border-radius:3px;
			display:none;
			background-color:black;
			color: white;
		}

		hr{
			thickness:1px;
			border-top:none;
		}

		#ani{
			border-radius:3px;
			width:250px;
		}
	</style>

</head>

<body>

	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="areadata.js"></script>

	<noscript>
		Your browser does not support Javascript
	</noscript>

	<center>
	<img id="aumap" usemap="#allmap">
	</center>

	<span>
		<img id="ani" src="">
		<hr>
		<p></p>
	</span>

	<map name="allmap">
		<area shape="circle" href="#" coords="69,40,8" id="jabiru">
		<area shape="circle" href="#" coords="42,77,8" id="brolga">
		<area shape="circle" href="#" coords="42,132,8" id="emu">
		<area shape="circle" href="#" coords="199,103,8" id="echidna1">
		<area shape="circle" href="#" coords="613,290,8" id="echidna2">
		<area shape="circle" href="#" coords="114,164,8" id="koala1">
		<area shape="circle" href="#" coords="378,170,8" id="koala2">
		<area shape="circle" href="#" coords="150,165,8" id="redkangaroo">
		<area shape="circle" href="#" coords="210,268,8" id="wombat1">
		<area shape="circle" href="#" coords="310,250,8" id="wombat2">
		<area shape="circle" href="#" coords="597,45,8" id="cassowary">
		<area shape="circle" href="#" coords="566,75,8" id="dingo">
		<area shape="circle" href="#" coords="570,137,8" id="tasmandevil">
		<area shape="circle" href="#" coords="465,44,8" id="binturong">
		<area shape="circle" href="#" coords="355,102,8" id="burmpython">
		<area shape="circle" href="#" coords="352,133,8" id="reticpython">
		<area shape="circle" href="#" coords="305,28,8" id="saltcroc1">
		<area shape="circle" href="#" coords="378,130,8" id="saltcroc2">
		<area shape="circle" href="#" coords="390,108,8" id="saltcroc3">
		<area shape="circle" href="#" coords="392,150,8" id="saltcroc4">
		<area shape="circle" href="#" coords="477,153,8" id="saltcroc5">
		<area shape="circle" href="#" coords="525,148,8" id="saltcroc6">
		<area shape="circle" href="#" coords="513,115,8" id="freshcroc">
		<area shape="circle" href="#" coords="477,200,8" id="aldtort1">
		<area shape="circle" href="#" coords="505,200,8" id="austurtle">
		<area shape="circle" href="#" coords="565,208,8" id="komodo">
		<area shape="circle" href="#" coords="611,210,8" id="lizard">
		<area shape="circle" href="#" coords="623,243,8" id="otter">
		<area shape="circle" href="#" coords="484,237,8" id="amealligator">
		<area shape="circle" href="#" coords="495,253,8" id="rhinoiguana">
		<area shape="circle" href="#" coords="120,287,8" id="redpanda">
		<area shape="circle" href="#" coords="180,375,8" id="tiger">
		<area shape="circle" href="#" coords="217,452,8" id="aldtort2">
		<area shape="circle" href="#" coords="159,457,8" id="boa">
		<area shape="circle" href="#" coords="115,478,8" id="lemur1">
		<area shape="circle" href="#" coords="220,485,8" id="lemur2">
		<area shape="circle" href="#" coords="175,473,8" id="parrot">
		<area shape="circle" href="#" coords="149,473,8" id="freshturtle">
		<area shape="circle" href="#" coords="127,542,8" id="swhiterhino">
		<area shape="circle" href="#" coords="67,546,8" id="meerkat">
		<area shape="circle" href="#" coords="214,548,8" id="zebra">
		<area shape="circle" href="#" coords="255,550,8" id="giraffe">
	</map>

</body>
</html>