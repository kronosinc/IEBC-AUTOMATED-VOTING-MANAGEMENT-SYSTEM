<?php
include '../db_config/connection.php';
if(isset($_POST['newregister']))
{
  $uname = $_POST['uname'];
  $nid = $_POST['nid'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $county = $_POST['county'];
  $constituency = $_POST['constituency'];
  $ward = $_POST['ward'];
  $polling = $_POST['polling'];
  $photo = addslashes($_FILES['photo']['tmp_name']);
  $photo=file_get_contents($photo);
  $photo = base64_encode($photo);
  $pwd = md5($_POST['pwd']);

  if($nid > 8 || $phone > 13)
  {
    $result=mysqli_query($conn, "INSERT INTO registrar( uname, nid, phone, email, gender, county, constituency, ward, polling, photo, pwd) VALUES ('$uname','$nid','$phone','$email','$gender','$county','$constituency','$ward','$polling','$photo','$pwd')") or die(mysqli_error($conn));
    if($result>0)
    {
      ?>
      <script>
      window.alert("REGISTRAR details uploaded successfully");
      window.location="new_reg.php";
      </script>

      <?php
    }
    else {
    ?>
      <script>
      window.alert("Upload failed. Try again!!");
        window.location="new_reg.php";
      </script>

      <?php

    }

  }
  else {
    ?>
      <script>
      window.alert("Phone or Id is incorrect!");
      window.location="new_reg.php";
      </script>

      <?php

  }



}


?>
