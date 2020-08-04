<?php
include '../db_config/connection.php';
if(isset($_FILES['photo']['type']))
{
  $uname = $_POST['uname'];
  $nid = $_POST['nid'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $county = $_POST['county'];
   $constituency = $_POST['constituency'];
  $photo = addslashes($_FILES['photo']['tmp_name']);
  $photo = file_get_contents($photo);
  $photo = base64_encode($photo);
  $pwd = md5($_POST['pwd']);
  if($nid > 8 || $phone > 13)
  {
  $result = mysqli_query($conn, "INSERT INTO returnings( uname, nid, phone, email, gender, county,constituency, photo, pwd ) VALUES ( '$uname','$nid','$phone','$email','$gender','$county','$constituency','$photo','$pwd') ") or die(mysqli_error($conn));
  	if($result>0)
    {
    $userrole="INSERT INTO user_info(Userrole,UserID)VALUES('ConstituencyReturning','".$email."')";
            if (mysqli_query($conn,$userrole) === TRUE) {
                 echo "Constituency Returning details uploaded successfully!!";
              } else {
                echo "<br>Error: " . mysqli_error($conn);
              }
    }
    else {
   echo "Upload failed. Try again!!";
    }

  }
  else {
   echo "Phone or id is incorrect";
  }



}
else{
  echo "No Data found";
}

?>
