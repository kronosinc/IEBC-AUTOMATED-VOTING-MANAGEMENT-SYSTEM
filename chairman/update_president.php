<?php
if(isset($_POST['uppresident'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE president SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "President Update Successiful";
} else {
	$error = $conn->error;
   echo "President Update Failed:".$error;
}

$conn->close();
?>
