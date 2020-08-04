<?php
$server="localhost";
$user="root";
$pass="";
$dbname="exam_system";
$conn=mysqli_connect($server,$user,$pass);
	if(!$conn)
		{
			echo "server conn failed";
		}
	else
	{

		 mysqli_select_db($conn,$dbname) or die("Database conn failed<br>");
	}
?>
