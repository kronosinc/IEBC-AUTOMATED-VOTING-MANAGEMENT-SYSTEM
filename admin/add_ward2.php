<?php
include '../db_config/connection.php';
if(isset($_POST['addward']))
{
  $wardcode = $_POST['wardcode'];
  $wardname = $_POST['wardname'];
  $constituencycode = $_POST['constituencycode'];

$result = mysqli_query($conn, "INSERT INTO ward( wardcode, wardname, constituencycode) VALUES ('$wardcode','$wardname','$constituencycode')" ) or die(mysqli_error($conn));
    if($result>0)
    {
      echo "WARD details uploaded successfully!!";

    }
    else {
  echo "Upload failed. Try again!!";
       
    }
}

?>
