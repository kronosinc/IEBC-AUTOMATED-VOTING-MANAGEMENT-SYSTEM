<?php
if(isset($_POST['upgovernor'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE governor SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "governor Update Successiful";
} else {
	$error = $conn->error;
   echo "governor Update Failed:".$error;
}

$conn->close();
?>
