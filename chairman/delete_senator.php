<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM senator  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "Senator Deleted Successiful";
} else {
	$error = $conn->error;
   echo "Senator Delete Failed:".$error;
}

$conn->close();
?>
