<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Results Page</title>
	<style type="text/css">
		body{
			background-color: #546590;
		}
		.container{
			margin-left: 5%;
			margin-right: 5%;
			text-align: center;
			background-color: white;
		}
		.nav{

		}
		.nav ul li{
			list-style: none;
			display: inline-block;
			font-size: 18px;
			padding: 5px;
			margin: 2px;
			border: 1px solid green;
			border-radius: 10px 15px 15px 10px;
		}
		.nav ul li a{
			text-decoration: none;
			color: #654635;
		}
		.nav ul li:hover {
			background-color: #546590;
		}
		.nav ul li a:hover{
			color: white;
		}
	</style>
</head>
<body>
<div class="container">
<div class="nav">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="voters-page.php">Voters Page</a></li>
		<li><a href="chairman-page.php">Chairman Page</a></li>
		<li><a href="presiding-page.php">Presiding Officer</a></li>
		<li><a href="ceo-page.php">CEO Page</a></li>
		<li><a href="county-page.php">County Page</a></li>
	</ul>
</div>
	

</div>
</body>
</html>