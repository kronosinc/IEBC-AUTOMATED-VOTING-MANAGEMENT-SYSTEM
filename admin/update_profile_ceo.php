<?php
include 'check_login_ceo.php';
include '../db_config/connection.php';
if(isset($_POST['uplogo'])) {
	$image = addslashes($_FILES['f1']['tmp_name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
	//$sql = "UPDATE amvs_info SET logo='".$logo."'";
	// $sql = "UPDATE user_info SET avatar='".$image."' where user_id ='$current_user_id'";
	$sql = "UPDATE ceo SET photo='".$image."'";

if ($conn->query($sql) === TRUE) {
    header("location:ceo_profile.php");
} 
else {
$error = $conn->error;
   header("location:./?err2=$error");
}

$conn->close();
}else{
	header("location:./");
}

?>