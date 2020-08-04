<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_user = $_SESSION['presiding_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
if(isset($_POST['uppresiding'])) {
$uname = $_POST['uname'];
$phone = $_POST['phone'];

}else{
  header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE presiding SET uname='$uname',  phone='$phone' where email='$myusername'";

if ($conn->query($sql) === TRUE) {
    echo "Presiding Update Successiful";
} else {
  $error = $conn->error;
   echo "Presiding Update Failed:".$error;
}

$conn->close();
?>
