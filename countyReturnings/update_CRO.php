<?php

include '../db_config/connection.php';
if(isset($_POST['upcountyreturnings'])) {
$uname = $_POST['uname'];
session_start();
$email = $_SESSION['countyreturnings_username'];
$nid = $_POST['nid'];
$phone = $_POST['phone'];

}else{
	header("location:./");
}

$sql = "UPDATE countyreturnings SET uname='$uname', nid='$nid', phone='$phone' where email='$email'";

if ($conn->query($sql) === TRUE) {
    echo "County Retuning Update Successiful";
} else {
	$error = $conn->error;
   echo "County Retuning Update Failed:".$error;
}

$conn->close();
?>
