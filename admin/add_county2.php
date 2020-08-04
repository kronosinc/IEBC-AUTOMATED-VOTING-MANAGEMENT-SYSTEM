<?php
include '../db_config/connection.php';
if(isset($_POST['addcounty']))
{
  $countycode = $_POST['countycode'];
  $countyname = $_POST['countyname'];

$result = mysqli_query($conn, "INSERT INTO county( countycode, countyname ) VALUES ('$countycode','$countyname' )" ) or die(mysqli_error($conn));
    if($result>0)
    {
      echo "COUNTY details uploaded successfully!!";
     

    }
    else {
    echo "Upload failed. Try again!!";

    }
}


?>
