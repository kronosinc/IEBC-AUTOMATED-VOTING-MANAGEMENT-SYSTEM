<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];
$name = $_POST['name'];
}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "UPDATE county SET  countyname='$name' where countycode='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "county Update Successiful";
} else {
	$error = $conn->error;
   echo "county Update Failed:".$error;
}

$conn->close();
?>
