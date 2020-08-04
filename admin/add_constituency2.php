<?php
include '../db_config/connection.php';
if(isset($_POST['addconstituency']))
{
  $constituencycode = $_POST['constituencycode'];
  $constituencyname = $_POST['constituencyname'];
  $countycode = $_POST['countycode'];

$result = mysqli_query($conn, "INSERT INTO constituency( constituencycode, constituencyname, countycode) VALUES ('$constituencycode','$constituencyname','$countycode')" ) or die(mysqli_error($conn));
    if($result>0)
    {
     echo "CONSTITUENCY details uploaded successfully!!";
     
    }
    else {
    echo "Upload failed. Try again!!";
    }
}


?>
