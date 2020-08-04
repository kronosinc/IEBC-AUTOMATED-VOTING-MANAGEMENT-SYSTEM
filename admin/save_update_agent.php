<?php
$agentid = $_GET['ref'];

include 'check_login.php';
$phone = $_POST['phone'];
$email = $_POST['email'];

include '../db_config/connection.php';
$sql = "SELECT * FROM agent where email='$email' and id != '$agentid'";
$result = $conn->query($sql);

if ($result->num_rows >0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['uname'];
       header("location:update_reg.php?ref=$agentid&msg=Email $email is used by $fullname22");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE agent SET email='$email', phone='$phone' WHERE id='$agentid'";

if ($conn->query($sql) === TRUE) {
   header("location:view_agent.php?ref=$agentid");
} else {
$error = $conn->error;
     header("location:view_agent.php?ref=$agentid&error=$error");
}

$conn->close();
}
$conn->close();




?>
