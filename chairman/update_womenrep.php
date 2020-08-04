<?php
if(isset($_POST['upwomenrep'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE womenrep SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "womenrep Update Successiful";
} else {
	$error = $conn->error;
   echo "womenrep Update Failed:".$error;
}

$conn->close();
?>
