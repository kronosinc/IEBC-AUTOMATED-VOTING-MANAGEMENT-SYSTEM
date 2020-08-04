<?php
if(isset($_POST['upvoters'])) {
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$nid = $_POST['nid'];

}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE voters SET firstname='$firstname', middlename='$middlename' , lastname='$lastname' where nid='$nid'";

if ($conn->query($sql) === TRUE) {
    echo "Voter Update Successiful";
} else {
	$error = $conn->error;
   echo "Voter Update Failed:".$error;
}

$conn->close();
?>
