<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['username'];
 $current_user = $_SESSION['currentuser'];
  $pollingstation=$_SESSION['pollingstation'];
   $agentid=$_SESSION['agentid'];
    $currentwardlogin=$_SESSION['currentwardlogin'];
     $currentconstituencylogin=$_SESSION['currentconstituencylogin'];
      $currentcountylogin=$_SESSION['currentcountylogin'];
 include '../db_config/connection.php';

$sql = "SELECT * FROM clerk where  email='$myusername'";
$result = $conn->query($sql);
$totalvoters=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $current_user_id = $row['email'];
    }
} else {
       header("../?login_err=You must be a Agent");
}
$conn->close();

} else {
    header("location:../?login_err=You must login first");
}
?>
