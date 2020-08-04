<?php
$constituencyid = $_GET['ref'];

include 'check_login.php';
$phone = $_POST['phone'];
$email = $_POST['email'];

include '../db_config/connection.php';
$sql = "SELECT * FROM constituency where email='$email' and id != '$constituencyid'";
$result = $conn->query($sql);

if ($result->num_rows >0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['uname'];
       header("location:update_constituency.php?ref=$constituencyid&msg=Email $email is used by $fullname22");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE constituency SET email='$email', phone='$phone' WHERE id='$constituencyid'";

if ($conn->query($sql) === TRUE) {
   header("location:view_constituency.php?ref=$constituencyid");
} else {
$error = $conn->error;
     header("location:view_constituency.php?ref=$reggid&error=$error");
}

$conn->close();
}
$conn->close();




?>
