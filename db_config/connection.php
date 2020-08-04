<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amvs_system";


$conn = new mysqli($servername, $username, $password);
// $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Server Connection failed: " . $conn->connect_error);
}
else {
 mysqli_select_db($conn,$dbname) or die("Database conn failed");
}
// function loggedinadmin()
//   {
// 	 if(isset($_SESSION['fullname']))
// 	 {
// 		 $logdin=TRUE;
// 		 return $logdin;
// 	 }		 
	  
//   }
//   function loggedinuser()
//   {
// 	 if(isset($_SESSION['customer']) || isset($_COOKIE['customer']))
// 	 {
// 		 $logdins=TRUE;
// 		 return $logdins;
// 	 }		 
	  
//   }
?>
