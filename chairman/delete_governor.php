<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM governor  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "Governor Deleted Successiful";
} else {
	$error = $conn->error;
   echo "Governor Delete Failed:".$error;
}

$conn->close();
?>
