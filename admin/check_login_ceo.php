<?php

session_start();
  $current_user = '';
  $mynid = '';
  $myusername = '';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

 include '../db_config/connection.php';
$current_user = $_SESSION['fullname_user'];
  $mynid = $_SESSION['nid'];
  $myusername = $_SESSION['username'];
$sql = "SELECT * FROM ceo where  email='$myusername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $current_user_id = $row['email'];
    }
} else {
       header("../?login_err=You must be a CEO");
}
$conn->close();

} else {
    header("location:../?login_err=You must login first");
}
?>
