<?php
$reggid = $_GET['ref'];

include 'check_login.php';
$phone = $_POST['phone'];
$email = $_POST['email'];

include '../db_config/connection.php';
$sql = "SELECT * FROM registrar where email='$email' and id != '$reggid'";
$result = $conn->query($sql);

if ($result->num_rows >0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['uname'];
       header("location:update_reg.php?ref=$reggid&msg=Email $email is used by $fullname22");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE registrar SET email='$email', phone='$phone' WHERE id='$reggid'";

if ($conn->query($sql) === TRUE) {
   header("location:view_reg.php?ref=$reggid");
} else {
$error = $conn->error;
     header("location:view_reg.php?ref=$reggid&error=$error");
}

$conn->close();
}
$conn->close();




?>
