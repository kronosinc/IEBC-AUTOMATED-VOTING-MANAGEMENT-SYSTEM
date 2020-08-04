<?php
include '../db_config/connection.php';
require_once('../ImageManipulator.php'); 
if(isset($_FILES['photo']['type']))
{
  $uname = $_POST['uname'];
  $nid = $_POST['nid'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
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

  // $photo = addslashes($_FILES['photo']['tmp_name']);
  // $photo=file_get_contents($photo);
  // $photo = base64_encode($photo);
  $pwd = md5($_POST['pwd']);

  if($nid > 8 || $phone > 12)
  {
$result = mysqli_query($conn, "INSERT INTO chairman( uname, nid, phone, email, gender,photo, pwd ) VALUES ('$uname','$nid','$phone','$email','$gender','$photo','$pwd')" ) or die(mysqli_error($conn));
    if($result>0)
    {
      $userrole="INSERT INTO user_info(Userrole,UserID)VALUES('Chairman','".$email."')";
            if (mysqli_query($conn,$userrole) === TRUE) {
                 echo "CHAIRMAN details uploaded successfully!!";
              } else {
                echo "<br>Error: " . mysqli_error($conn);
              }
            }
    else {
    echo "Upload failed. Try again!!";
    }

  }
  else {
    echo "phone or id is incorrect";
  }



}
else {
 echo "No data submitted";
}


?>
