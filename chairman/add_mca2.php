<?php
include '../db_config/connection.php';
if(isset($_FILES['photo']['type']))
{
  $uname = $_POST['uname'];
  $nid = $_POST['nid'];
  $countycode=$_POST['countycode'];
  $constituencycode=$_POST['constituencycode'];
  $wardcode = $_POST['wardcode'];
  $partycode = $_POST['partycode'];
  $gender = $_POST['gender'];
  // $photo = addslashes($_FILES['photo']['tmp_name']);
  // $photo = file_get_contents($photo);
  // $photo = base64_encode($photo);
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
            // $width   = $manipulator->getWidth();
            // $height = $manipulator->getHeight();
            // // $centreX = round($width / 2);
            // $centreY = round($height / 2);
            
            // saving file to uploads folder
            $manipulator->save('../uploads/' .$nid.$fileExtension);
            $photo=$nid.$fileExtension;
      }
      else{
        echo "Invalid Image Type";
      }
    }


  if($nid > 8 || $phone > 13)
  {
$result = mysqli_query($conn, "INSERT INTO mca( uname, nid, countycode, constituencycode, wardcode, partycode, gender, photo ) VALUES ('$uname','$nid','$countycode','$constituencycode','$wardcode','$partycode','$gender','$photo' )" ) or die(mysqli_error($conn));
    if($result>0)
    {
      echo "MCA details uploaded successfully!!";

    }
    else {
    echo "Upload failed. Try again!!";
    }

  }
  else {
    echo "phone or id is incorrect";
  }



}


?>
