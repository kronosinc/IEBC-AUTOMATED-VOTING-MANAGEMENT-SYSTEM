<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM mca  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "MCA Deleted Successiful";
} else {
	$error = $conn->error;
   echo "MCA Delete Failed:".$error;
}

$conn->close();
?>
