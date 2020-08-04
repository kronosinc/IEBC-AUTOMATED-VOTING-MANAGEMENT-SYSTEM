<?php
include '../db_config/connection.php';
if(isset($_POST['addpolling']))
{
  $pollingcode = $_POST['pollingcode'];
  $pollingname = $_POST['pollingname'];
  $wardcode = $_POST['wardcode'];

$result = mysqli_query($conn, "INSERT INTO polling( pollingcode, pollingname, wardcode ) VALUES ('$pollingcode','$pollingname','$wardcode')" ) or die(mysqli_error($conn));
    if($result>0)
    {
     echo "POLLING details uploaded successfully!!";
    }
    else {
    echo "Upload failed. Try again!!";
    }
}
else{
  echo "No Data Submitted";
}

?>
