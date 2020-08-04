<?php

include 'check_login_ceo.php';
include '../db_config/connection.php';

if(isset($_POST['updateceoinfo']))
{
//$avatar = $row['avatar'];
 $gender = $_POST['gender'];
$full_name = $_POST['name'];
$phone = $_POST['phone'];
$password= $_POST['password1'];
$password = md5($password);

$sql="UPDATE ceo SET uname='$full_name', gender='$gender', phone='$phone', pwd='$password' WHERE nid='$mynid'";

  if ($conn->query($sql) === TRUE) {
    ?>
      <script>
      window.alert("CEO details updated successfully");
      window.location="ceo_profile.php";
      </script>
      <?php
} 
   else {

    ?>
    <script>
    window.alert("Ceo details not updated. Try again.");
    window.location="ceo_profile.php";
    </script>
    <?php
  }

  }
  $conn->close();

?>
