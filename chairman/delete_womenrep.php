<?php
if(isset($_POST['Sno'])) {
$Sno = $_POST['Sno'];


}else{
	header("location:./");
}

include '../db_config/connection.php';
$sql = "DELETE FROM womenrep  where Sno='$Sno'";

if ($conn->query($sql) === TRUE) {
    echo "WomenRep Deleted Successiful";
} else {
	$error = $conn->error;
   echo "WomenRep Delete Failed:".$error;
}

$conn->close();
?>
