<?php
if(isset($_POST['upamvsinfo'])) {
$uname = $_POST['uname'];
$email = $_POST['email'];
$addr = $_POST['addr'];
$phones = $_POST['phone'];
$motto = $_POST['motto'];
}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE amvs_info SET uname='$uname', email='$email', phone=".$phones.", addr='$addr', motto='$motto'";

if ($conn->query($sql) === TRUE) {
    header("location:./");
} else {
	$error = $conn->error;
   header("location:./?error=$error");
}

$conn->close();
?>
