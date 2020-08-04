<?php
include '../db_config/connection.php';
$uname = $_REQUEST['uname'];

$query= mysqli_query($conn, "UPDATE womenrep SET womenrep_votes=womenrep_votes+1 where uname='$uname'") or die(mysqli_error($conn));
?>
