<?php
if(isset($_POST['upmca'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE mca SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "mca Update Successiful";
} else {
	$error = $conn->error;
   echo "mca Update Failed:".$error;
}

$conn->close();
?>
