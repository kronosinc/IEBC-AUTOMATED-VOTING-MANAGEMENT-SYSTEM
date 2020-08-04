<?php
$countyretid = $_GET['ref'];

include 'check_login.php';
$phone = $_POST['phone'];
$email = $_POST['email'];

include '../db_config/connection.php';
$sql = "SELECT * FROM returnings where email='$email' and id != '$countyretid'";
$result = $conn->query($sql);

if ($result->num_rows >0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['uname'];
       header("location:update_countyret.php?ref=$countyretid&msg=Email $email is used by $fullname22");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE registrar SET email='$email', phone='$phone' WHERE id='$countyretid'";

if ($conn->query($sql) === TRUE) {
   header("location:view_countyret.php?ref=$countyretid");
} else {
$error = $conn->error;
     header("location:update_countyret.php?ref=$countyretid&error=$error");
}

$conn->close();
}
$conn->close();




?>
