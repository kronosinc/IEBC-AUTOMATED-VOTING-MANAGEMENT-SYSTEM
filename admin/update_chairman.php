<?php
if(isset($_POST['upchairman'])) {
$uname = $_POST['uname'];
$email = $_POST['email'];
$nid = $_POST['nid'];
$phone = $_POST['phone'];
}else{
	echo "No details submitted for updating chairman";
}

include '../db_config/connection.php';
$sql = "UPDATE chairman SET uname='$uname', email='$email', nid='$nid',phone='$phone'";

if ($conn->query($sql) === TRUE) {
    echo "Chairman Update Successiful";
} else {
	$error = $conn->error;
   echo "Chairman Update Failed:".$error;
}

$conn->close();
?>
