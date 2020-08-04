<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['username'];
  $current_user = $_SESSION['currentuser'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
if(isset($_POST['upclerk'])) {
$uname = $_POST['uname'];
$phone = $_POST['phone'];

}else{
  header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE clerk SET uname='$uname',  phone='$phone' where email='$myusername'";

if ($conn->query($sql) === TRUE) {
    echo "Clerk Update Successiful";
} else {
  $error = $conn->error;
   echo "Clerk Update Failed:".$error;
}

$conn->close();
?>
