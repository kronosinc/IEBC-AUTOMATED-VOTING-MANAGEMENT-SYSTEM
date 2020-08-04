<?php

$ids = $_POST['ids'];
$startdatevoting=$_POST['startdatevoting'];
$enddatevoting=$_POST['enddatevoting'];
$activityvoting=$_POST['activityvoting'];
// include '../db_config/connection.php';
// $sql = "SELECT * FROM votingsession where StartDate='$email' and id != '$ids'";
// $result = $conn->query($sql);
// if ($result->num_rows >0) {

//     while($row = $result->fetch_assoc()) {
// 		$fullname22 = $row['uname'];
//       echo $email." is used";
//     }
// } 
// else {
    include '../db_config/connection.php';
$sql = "UPDATE votingsession SET StartDate='$startdatevoting', EndDate='$enddatevoting' Activity='$activityvoting' WHERE id='$ids'";

if ($conn->query($sql) === TRUE) {
   echo "Voting Date  Update successively";
} else {
$error = $conn->error;
     echo "Failed to Update Voting Date";
}

// }
$conn->close();
?>
