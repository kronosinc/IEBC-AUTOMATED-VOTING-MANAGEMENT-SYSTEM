<?php
// include 'check_login.php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['admin_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['admin_username'];
  $current_user = $_SESSION['admin_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First ");
 }
if(isset($_FILES['f1']['type'])) {
	$image = addslashes($_FILES['f1']['tmp_name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
	//$sql = "UPDATE amvs_info SET logo='".$logo."'";
	// $sql = "UPDATE user_info SET avatar='".$image."' where user_id ='$current_user_id'";
	$sql = "UPDATE ict_admin SET avatar='".$image."'";

if ($conn->query($sql) === TRUE) {
  echo "Photo Updated Successiful";
} else {
$error = $conn->error;
   echo "Failed to Update Photo:".$error;
}
}else{
	echo "No image Updloaded";
}

$conn->close();
?>

