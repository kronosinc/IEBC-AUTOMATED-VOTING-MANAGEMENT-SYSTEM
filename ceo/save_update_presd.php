<?php
$phone = $_POST['phone'];
$email = $_POST['email'];
$ids = $_POST['ids'];
include '../db_config/connection.php';
$sql = "SELECT * FROM presiding where email='$email' and id != '$ids'";
$result = $conn->query($sql);
if ($result->num_rows >0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['uname'];
      echo $email." is used";
    }
} 
else {
    include '../db_config/connection.php';
$sql = "UPDATE presiding SET email='$email', phone='$phone' WHERE id='$ids'";

if ($conn->query($sql) === TRUE) {
   echo "presiding Update successively";
} else {
$error = $conn->error;
     echo "Failed to Update presiding";
}

}
$conn->close();
?>
