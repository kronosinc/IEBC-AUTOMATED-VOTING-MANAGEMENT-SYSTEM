<?php
include '../db_config/connection.php';
if(isset($_POST['uplogo'])) {
	$logo = addslashes($_FILES['f1']['tmp_name']);
	$logo = file_get_contents($logo);
	$logo = base64_encode($logo);
	$sql = "UPDATE amvs_info SET logo='".$logo."'";
}else{
	echo "No image Updloaded";
}
if ($conn->query($sql) === TRUE) {
  echo "Photo Updated Successiful";
} else {
$error = $conn->error;
   echo "Failed to Update Photo:".$error;
}

$conn->close();
?>

