<?php
if(isset($_FILES['f1']['type'])) {
	$image = addslashes($_FILES['f1']['tmp_name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
}else{
	echo "No image Updloaded";
}

include '../db_config/connection.php';

$sql = "UPDATE ceo SET photo='".$image."'";

if ($conn->query($sql) === TRUE) {
  echo "Photo Updated Successiful";
} else {
$error = $conn->error;
   echo "Failed to Update Photo:".$error;
}

$conn->close();
?>
