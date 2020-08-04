<?php
include '../db_config/connection.php';
$uname = $_REQUEST['uname'];

$query= mysqli_query($conn, "UPDATE senator SET senator_votes=senator_votes+1 where uname='$uname'") or die(mysqli_error($conn));
?>
