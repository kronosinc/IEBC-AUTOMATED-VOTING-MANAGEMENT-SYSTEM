<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM mp  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "MP Deleted Successiful";
} else {
	$error = $conn->error;
   echo "MP Delete Failed:".$error;
}

$conn->close();
?>
