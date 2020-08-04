<?php
if(isset($_POST['upmp'])) {
$uname = $_POST['uname'];
$partycode = $_POST['partycode'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE mp SET uname='$uname', partycode='$partycode' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "mp Update Successiful";
} else {
	$error = $conn->error;
   echo "mp Update Failed:".$error;
}

$conn->close();
?>
