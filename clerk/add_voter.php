<?php
include '../db_config/connection.php';
if(isset($_FILES['photo']['name']))
{
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $nid = $_POST['nid'];
  $gender = $_POST['gender'];
  $polling = $_POST['polling'];
  require_once('../ImageManipulator.php'); 
$photo='';
    if ($_FILES['photo']['error'] > 0) {
          echo "Error: " . $_FILES['photo']['error'] . "<br />";
        } 
        else {
          // array of valid extensions
          $validExtensions = array('.jpg', '.jpeg', '.gif', '.png','.JPG', '.JPEG', '.GIF', '.PNG');
          // get extension of the uploaded file
          $fileExtension = strrchr($_FILES['photo']['name'], ".");
          // check if file Extension is on the list of allowed ones
          if (in_array($fileExtension, $validExtensions)) {
           $manipulator = new ImageManipulator($_FILES['photo']['tmp_name']);
            $newImage = $manipulator->resample(150, 100);
         
            $manipulator->save('../uploads/' .$nid.$fileExtension);
            $photo=$nid.$fileExtension;
      }
      else{
        echo "Invalid Image Type";
      }
    }


  $result = mysqli_query($conn, "INSERT INTO voters( firstname, middlename, lastname, nid, gender, polling, photo ) VALUES ( '$firstname','$middlename','$lastname','$nid','$gender',' $polling','$photo') ") or die(mysqli_error($conn));
  	if($result>0)
    {
      $Sno=mysqli_insert_id($conn);
      echo "VOTER details uploaded successfully!!<br>";
      echo '<a href="printvoter.php?Sno='.$Sno.'" target="_blank"><button class="btn  btn-info btn-block editvoter" >Print Voters Card</button></a>';
    }
    else {
    echo "Upload failed. Try again!!";

    }


  }

?>
