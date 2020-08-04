<?php
include '../db_config/connection.php';
if(isset($_POST['partycode']))
{
  $partycode = $_POST['partycode'];
  $partyname = $_POST['partyname'];

$result = mysqli_query($conn, "INSERT INTO party( partycode, partyname ) VALUES ('$partycode','$partyname')" ) or die(mysqli_error($conn));
    if($result>0)
    {
     echo "PARTY details uploaded successfully!!";
     
    }
      else {
     echo "Upload failed. Try again!!";
      }
  }
else
{
echo "No data Submitted";
}
  ?>

