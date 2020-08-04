<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['returnings_username'];
  $current_constituencyret = $_SESSION['fullname_returnings'];
   $constituencyret_id=$_SESSION['constituencyret_id'] ;
   $constituency_name=$_SESSION['constituency_name'] ;
  $current_constituency=$_SESSION['current_constituency'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
if(isset($_POST['upreturnings'])) {
$uname = $_POST['uname'];
$phone = $_POST['phone'];

}else{
  header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE returnings SET uname='$uname',  phone='$phone' where email='$myusername'";

if ($conn->query($sql) === TRUE) {
    echo "Constituency Returning Update Successiful";
} else {
  $error = $conn->error;
   echo "Constituency Returning Update Failed:".$error;
}

$conn->close();
?>
