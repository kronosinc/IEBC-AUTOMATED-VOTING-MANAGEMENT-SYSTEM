<?php
if(isset($_POST['upsenator'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE senator SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "senator Update Successiful";
} else {
	$error = $conn->error;
   echo "senator Update Failed:".$error;
}

$conn->close();
?>
