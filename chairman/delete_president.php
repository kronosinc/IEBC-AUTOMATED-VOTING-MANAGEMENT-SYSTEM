<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM president  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "President Deleted Successiful";
} else {
	$error = $conn->error;
   echo "President Delete Failed:".$error;
}

$conn->close();
?>
