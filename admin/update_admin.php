<?php

//include 'check_login.php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['admin_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['admin_username'];
  $current_user = $_SESSION['admin_fullname'];
  $userid = $_SESSION['admin_userid'];
 }
 else{
  header("Location:../index.php?login_err=Login First ");
 }
if(isset($_POST['upadmin']))
{
 //$gender = $_POST['gender'];
$full_name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$password= $_POST['password'];
$password = md5($password);

  // $sql = mysqli_query($conn,"UPDATE ict_admin SET full_name='$full_name', gender='$gender', email='$email',address='$address', password='$password' WHERE user_id='$current_user'") or die(mysqli_error($conn));
$sql="UPDATE ict_admin SET full_name='$full_name',  email='$email',address='$address', password='$password' WHERE user_id='$userid'";
  if ($conn->query($sql) === TRUE) {
    echo "Admin details updated successfully";
} 
   else {
echo "Admin details not updated. Try again.";
  }

  }
  else{
    echo "No data uploaded";
  }
  $conn->close();

?>
