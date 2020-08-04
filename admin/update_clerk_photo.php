<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['username'];
  $current_user = $_SESSION['currentuser'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
if(isset($_FILES['f1']['type'])) {
	$image = addslashes($_FILES['f1']['tmp_name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
}else{
	echo "No image Updloaded";
}

include '../db_config/connection.php';

$sql = "UPDATE clerk SET photo='".$image."' where email='$myusername'";

if ($conn->query($sql) === TRUE) {
  echo "Photo Updated Successiful";
} else {
$error = $conn->error;
   echo "Failed to Update Photo:".$error;
}

$conn->close();
?>
