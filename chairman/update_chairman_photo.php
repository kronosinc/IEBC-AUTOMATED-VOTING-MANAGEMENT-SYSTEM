<?php
if(isset($_FILES['f1']['type'])) {
	// $image = addslashes($_FILES['f1']['tmp_name']);
	// $image = file_get_contents($image);
	// $image = base64_encode($image);
	require_once('../ImageManipulator.php'); 
	$nid=$_POST['nid'];
$image='';
    if ($_FILES['f1']['error'] > 0) {
          echo "Error: " . $_FILES['f1']['error'] . "<br />";
        } 
        else {
          // array of valid extensions
          $validExtensions = array('.jpg', '.jpeg', '.gif', '.png','.JPG', '.JPEG', '.GIF', '.PNG');
          // get extension of the uploaded file
          $fileExtension = strrchr($_FILES['f1']['name'], ".");
          // check if file Extension is on the list of allowed ones
          if (in_array($fileExtension, $validExtensions)) {
           $manipulator = new ImageManipulator($_FILES['f1']['tmp_name']);
            $newImage = $manipulator->resample(150, 100);
            // $width   = $manipulator->getWidth();
            // $height = $manipulator->getHeight();
            // // $centreX = round($width / 2);
            // $centreY = round($height / 2);
            
            // saving file to uploads folder
            $manipulator->save('../uploads/' .$nid.$fileExtension);
            $image=$nid.$fileExtension;
      }
      else{
        echo "Invalid Image Type";
      }
    }
}else{
	echo "No image Updloaded";
}

include '../db_config/connection.php';

$sql = "UPDATE chairman SET photo='".$image."'";

if ($conn->query($sql) === TRUE) {
  echo "Photo Updated Successiful";
} else {
$error = $conn->error;
   echo "Failed to Update Photo:".$error;
}

$conn->close();
?>
