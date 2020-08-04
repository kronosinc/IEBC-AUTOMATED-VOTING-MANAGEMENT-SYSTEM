<?php
include '../db_config/connection.php';
if(isset($_POST['newvoter']))
{
  $fname = $_POST['fname'];
  $nid = $_POST['nid'];
  $tel = $_POST['tel'];
  $gender = $_POST['gender'];
  $county = $_POST['county'];
  $ward = $_POST['ward'];
  $poll =  $_POST['poll'];

  if($nid > 8 || $tel > 13)
  {
    $result=mysqli_query($conn, "INSERT INTO voter(fname, nid, tel, gender, county, ward, poll) VALUES ('$fname','$nid','$tel','$gender','$county','$ward','$poll')") or die(mysqli_error($conn));
    if($result>0)
    {
      ?>
      <script>
      window.alert("VOTER details uploaded successfully");
      window.location="new_voter.php";
      </script>

      <?php
    }
    else {
    ?>
      <script>
      window.alert("Upload failed. Try again!!");
        window.location="new_voter.php";
      </script>

      <?php

    }

  }
  else {
    ?>
      <script>
      window.alert("Tel or ID is incorrect");
      window.location="new_voter.php";
      </script>

      <?php

  }



}


?>
