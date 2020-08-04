<?php
$my_username = $_POST['username'];
$my_password = md5($_POST['password']);

include '../db_config/connection.php';

$sql = "SELECT * FROM ict_admin where user_id='$my_username' or email='$my_username' and password='$my_password'";
$result = $conn->query($sql) or die(mysqli_error($conn));

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$user_role = $row['role'];
		$fullname = $row['full_name'];
        $userid = $row['user_id'];
			setcookie(loggedin, date("F jS - g:i a"), $seconds);
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $my_username;
            $_SESSION['fullname'] = $fullname;
             $_SESSION['userid'] = $userid;
			header("location:../admin/");
    }
} else {
  header("location:../index2.php?login_err=Account not found in database");

}
$conn->close();
?>
