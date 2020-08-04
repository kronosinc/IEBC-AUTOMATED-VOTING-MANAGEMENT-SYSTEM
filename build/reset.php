<?php
include '../db_config/connection.php';
    if(isset($_POST['idno']) && isset($_POST['email']))
    {
      $email = $_POST['email'];
       $idno = ($_POST['idno']);
      // $pwd = md5($_POST['pwd']);
      $position="";
//generate Reset Password number
      $ch="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz?&#/";
  $l=strlen($ch)-1;
  $str="";
  for ($i=0; $i < 10; $i++) { 
    $x=rand(0,$l);
    $str.=$ch[$x];
  }
   $Password= $str;
  $resetPassword= md5($str);

      //select user roles
       $sql1 = "SELECT * FROM user_info where UserID='$email'";
      $result1 = $conn->query($sql1) or die(mysqli_error($conn));
      if ($result1->num_rows > 0) {
          while($row1 = $result1->fetch_assoc()) {
            $position=$row1['Userrole'];
          }

        }
        else{
             echo "No Role Assigned";
        }
      
      switch($position)
      {
         case 'Administrator':
             {
                  echo "No Reset Functionality Available for this Account.<br> Please contact your Administrator .";
              break;
     }
//reset chairman

      case 'Chairman':
    {
        $sql = "SELECT * FROM chairman where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`chairman` SET `Status` = 'Reset' WHERE `chairman`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }

      case 'CEO':
      {
            $sql = "SELECT * FROM ceo where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`ceo` SET `Status` = 'Reset' WHERE `ceo`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }

      case 'ConstituencyReturning':
    {
           $sql = "SELECT * FROM returnings where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`returnings` SET `Status` = 'Reset' WHERE `returnings`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }


      case 'CountyReturningOfficer':
     {
       $sql = "SELECT * FROM countyreturnings where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`countyreturnings` SET `Status` = 'Reset' WHERE `countyreturnings`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }


      case 'PresidingOfficer':
     {
           $sql = "SELECT * FROM presiding where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`presiding` SET `Status` = 'Reset' WHERE `presiding`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }


      case 'ClerkOfficer':
     {
           $sql = "SELECT * FROM clerk where email='$email' && nid='$idno'";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
                $update=" UPDATE `amvs_system`.`clerk` SET `Status` = 'Reset' WHERE `clerk`.`email` ='$email'";
                $updateresult=mysqli_query($conn,$update);
                if ($updateresult) {
                  echo "Password Reset Succesifully<br>";
                      $update=" UPDATE `amvs_system`.`user_info` SET `ResetPassword` = '$resetPassword' WHERE `user_info`.`UserID` ='$email'";
                    $updateresult=mysqli_query($conn,$update);
                    if ($updateresult) {
                      echo "Your Reset Password is <br><b>".$Password."</b>";
                    }
                    else{
                      echo "Reset Password Not Generated.<br>Please Reset Again".mysqli_error($conn);
                    }
                }
                else{
                  echo "Password Reset Failed  ".mysqli_error($conn);
                }
          }
      } else {
         echo "Account not found in database .";
      }
      $conn->close();
      break;
    }

      default:
      {
        echo "No Role Assigned.";
        break;
      }
      }
    }
?>
