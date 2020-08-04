<?php

$ids = $_POST['id'];

    include '../db_config/connection.php';
$sql = "DELETE FROM votingsession WHERE id='$ids'";
if ($conn->query($sql) === TRUE) {
   echo " SESSION  DELETED successively";
} else {
$error = $conn->error;
     echo "Failed to DELETED  SESSION".mysql_error($conn);
}
$conn->close();
?>
