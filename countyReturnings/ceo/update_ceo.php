<?php
if(isset($_POST['upceo'])) {
$uname = $_POST['uname'];
$email = $_POST['email'];
$nid = $_POST['nid'];
$phone = $_POST['phone'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE ceo SET uname='$uname', email='$email', nid='$nid', phone='$phone'";

if ($conn->query($sql) === TRUE) {
    echo "CEO Update Successiful";
} else {
	$error = $conn->error;
   echo "CEO Update Failed:".$error;
}

$conn->close();
?>
