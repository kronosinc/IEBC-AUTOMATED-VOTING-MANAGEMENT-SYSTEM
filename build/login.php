<?php
include '../db_config/connection.php';
    if(isset($_POST['submit']))
    {
      $email = $_POST['email'];
      $pwd = md5($_POST['pwd']);
      $position="";

      //select user roles
       $sql1 = "SELECT * FROM user_info where UserID='$email'";
      $result1 = $conn->query($sql1) or die(mysqli_error($conn));
      if ($result1->num_rows > 0) {
          while($row1 = $result1->fetch_assoc()) {
            $position=$row1['Userrole'];
          }

        }
        else{
              header("location:../index.php?login_err=Username Is Not Recognised.");
        }
      
      switch($position)
      {
         case 'Administrator':
             {
                  $sql = "SELECT * FROM ict_admin where  email='$email' and password='$pwd'";
                $result = $conn->query($sql) or die(mysqli_error($conn));

                if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                $user_role = $row['role'];
                $fullname = $row['full_name'];
                    $userid = $row['user_id'];
                  //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                
                        session_start();
                      //    setcookie("admin",$email,time()+60);
                        $_SESSION['loggedin'] = true;
                        $_SESSION['admin_username'] = $email;
                        $_SESSION['admin_fullname'] = $fullname;
                         $_SESSION['admin_userid'] = $userid;
                         echo '<meta http-equiv="refresh" content="3; url=../admin/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
                  //header("location:../admin/");
                }
        } else {
          header("location:../index.php?login_err=Account not found in database");

        }
              $conn->close();
              break;
     }

      case 'Chairman':
    {
        $sql = "SELECT * FROM chairman where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));
      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
          
            if ($status=="Active") {

              $uname = $row['uname'];
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['chairman_fullname'] = $uname;
                    $_SESSION['chairman_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../chairman/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = mysqli_query($conn,$resetsql) or die(mysqli_error($conn));

                      if (mysqli_num_rows($resetresult)> 0) {
                                               
                          $uname = $row['uname'];
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['chairman_fullname'] = $uname;
                    $_SESSION['chairman_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../chairman/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
                        }
                        else{
                         header("location:../?login_err=Wrong Reset Password");
                        }
                     


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

       
           // header("location:../chairman/index.php");
          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }

      case 'CEO':
      {

         $sql = "SELECT * FROM ceo where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
            if ($status=="Active") {
            $uname = $row['uname'];
          $nid = $row['nid'];
           // setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['ceo_fullname'] = $uname;
                    $_SESSION['ceo_username'] = $email;
                     $_SESSION['ceo_nid'] = $nid;
                     echo '<meta http-equiv="refresh" content="3; url=../ceo/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = $conn->query($resetsql) or die(mysqli_error($conn));

                      if ($resetresult->num_rows > 0) {
                         $uname = $row['uname'];
          $nid = $row['nid'];
           // setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['ceo_fullname'] = $uname;
                    $_SESSION['ceo_username'] = $email;
                     $_SESSION['ceo_nid'] = $nid;
                     echo '<meta http-equiv="refresh" content="3; url=../ceo/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
                        }
                         else{
                         header("location:../?login_err=Wrong Reset Password");
                        }


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

        
          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }

     
      case 'ConstituencyReturning':
    {

        $sql = "SELECT * FROM returnings where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
            if ($status=="Active") {
                 $uname = $row['uname'];
          $constituency = $row['constituency'];
          $id = $row['id'];
          $sql2 = "SELECT * FROM constituency where constituencycode='$constituency'  order by constituencycode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['fullname_returnings'] = $uname;
                    $_SESSION['current_constituency'] = $constituency;
                  $_SESSION['constituencyret_id'] = $id;
                   $_SESSION['constituency_name'] =  $row2['constituencyname'];
                    $_SESSION['returnings_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../returnings/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
            //header("location:../returnings/index.php");
          }
        }
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = $conn->query($resetsql) or die(mysqli_error($conn));

                      if ($resetresult->num_rows > 0) {
                              $uname = $row['uname'];
          $constituency = $row['constituency'];
          $id = $row['id'];
          $sql2 = "SELECT * FROM constituency where constituencycode='$constituency'  order by constituencycode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['fullname_returnings'] = $uname;
                    $_SESSION['current_constituency'] = $constituency;
                  $_SESSION['constituencyret_id'] = $id;
                   $_SESSION['constituency_name'] =  $row2['constituencyname'];
                    $_SESSION['returnings_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../returnings/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
            //header("location:../returnings/index.php");
          }
           
        }
                        }
                        else{
                         header("location:../?login_err=Wrong Reset Password");
                        }


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }


      case 'CountyReturningOfficer':
     {

           $sql = "SELECT * FROM countyreturnings where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
            if ($status=="Active") {
           $uname = $row['uname'];
            $county = $row['county'];
             $id = $row['id'];

             $sql2 = "SELECT * FROM county where countycode='$county'  order by countycode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['fullname_countyreturnings'] = $uname;
                  $_SESSION['countyreturnings_current_county'] = $county;
                  $_SESSION['countyret_id'] = $id;
                  $_SESSION['county_name'] =  $row2['countyname'];
                    $_SESSION['countyreturnings_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../CountyReturnings/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = $conn->query($resetsql) or die(mysqli_error($conn));

                      if ($resetresult->num_rows > 0) {
          $uname = $row['uname'];
            $county = $row['county'];
             $id = $row['id'];

             $sql2 = "SELECT * FROM county where countycode='$county'  order by countycode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
            //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['fullname_countyreturnings'] = $uname;
                  $_SESSION['countyreturnings_current_county'] = $county;
                  $_SESSION['countyret_id'] = $id;
                  $_SESSION['county_name'] =  $row2['countyname'];
                    $_SESSION['countyreturnings_username'] = $email;
                    echo '<meta http-equiv="refresh" content="3; url=../CountyReturnings/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
                        }
                         else{
                         header("location:../?login_err=Wrong Reset Password");
                        }


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }

      
      case 'PresidingOfficer':
     {

      $sql = "SELECT * FROM presiding where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
            if ($status=="Active") {
          $uname = $row['uname'];
          $currentpolling = $row['polling'];
          $presidingid=$row['id'];

            $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,constituency.constituencycode,county.countycode FROM ward,polling,constituency,county where polling.pollingcode='$currentpolling' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode group by county.countycode order by polling.pollingcode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
           // setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['presiding_fullname'] = $uname;
                    $_SESSION['presiding_username'] = $email;
                     $_SESSION['presiding_currentpolling'] = $currentpolling;
                      $_SESSION['presiding_pollingname'] =  $row2['pollingname'];
                       $_SESSION['presidingid'] = $presidingid;
                       echo '<meta http-equiv="refresh" content="3; url=../presiding/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = $conn->query($resetsql) or die(mysqli_error($conn));

                      if ($resetresult->num_rows > 0) {
         $uname = $row['uname'];
          $currentpolling = $row['polling'];
          $presidingid=$row['id'];

            $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,constituency.constituencycode,county.countycode FROM ward,polling,constituency,county where polling.pollingcode='$currentpolling' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode group by county.countycode order by polling.pollingcode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
           // setcookie(loggedin, date("F jS - g:i a"), $seconds);
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['presiding_fullname'] = $uname;
                    $_SESSION['presiding_username'] = $email;
                     $_SESSION['presiding_currentpolling'] = $currentpolling;
                      $_SESSION['presiding_pollingname'] =  $row2['pollingname'];
                       $_SESSION['presidingid'] = $presidingid;
                       echo '<meta http-equiv="refresh" content="3; url=../presiding/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
                        }
                        else{
                         header("location:../?login_err=Wrong Reset Password");
                        }


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }
     
      case 'ClerkOfficer':
     {
       $sql = "SELECT * FROM clerk where email='$email' && (pwd='$pwd' || Status='Reset') ";
      $result = $conn->query($sql) or die(mysqli_error($conn));

      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $status=$row['Status'];
            if ($status=="Active") {
        $uname = $row['uname'];
          $pollingstation=$row['polling'];
           $clerkid=$row['id'];
          
           //select ward,constituance,county
                 $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,constituency.constituencycode,county.countycode FROM ward,polling,constituency,county where polling.pollingcode='$pollingstation' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode group by county.countycode order by polling.pollingcode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
                    //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                     session_start();
                      $_SESSION['loggedin'] = true;
                     $_SESSION['clerk_currentuser'] = $uname;
                    $_SESSION['clerk_username'] = $email;
                    $_SESSION['clerk_pollingstation'] = $pollingstation;
                     $_SESSION['clerk_pollingname'] =  $row2['pollingname'];
                     $_SESSION['clerkid'] = $clerkid;
                    $_SESSION['clerk_currentwardlogin'] = $row2['wardcode'];
                    $_SESSION['clerk_currentconstituencylogin'] = $row2['constituencycode'];
                      $_SESSION['clerk_currentcountylogin'] = $row2['countycode'];
                      echo '<meta http-equiv="refresh" content="3; url=../clerk/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
            }
            else if ($status=="Reset") {
                      $resetsql = "SELECT `Sno`, `Userrole`, `UserID`, `ResetPassword`, `DateAdded` FROM `user_info` where  UserID='$email' && ResetPassword='$pwd' ";
                      $resetresult = $conn->query($resetsql) or die(mysqli_error($conn));

                      if ($resetresult->num_rows > 0) {
        $uname = $row['uname'];
          $pollingstation=$row['polling'];
           $clerkid=$row['id'];
          
           //select ward,constituance,county
                 $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,constituency.constituencycode,county.countycode FROM ward,polling,constituency,county where polling.pollingcode='$pollingstation' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode group by county.countycode order by polling.pollingcode";
                  $result2 = $conn->query($sql2) or die(mysqli_error($conn));
                  if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
                    //setcookie(loggedin, date("F jS - g:i a"), $seconds);
                     session_start();
                      $_SESSION['loggedin'] = true;
                     $_SESSION['clerk_currentuser'] = $uname;
                    $_SESSION['clerk_username'] = $email;
                    $_SESSION['clerk_pollingstation'] = $pollingstation;
                     $_SESSION['clerk_pollingname'] =  $row2['pollingname'];
                     $_SESSION['clerkid'] = $clerkid;
                    $_SESSION['clerk_currentwardlogin'] = $row2['wardcode'];
                    $_SESSION['clerk_currentconstituencylogin'] = $row2['constituencycode'];
                      $_SESSION['clerk_currentcountylogin'] = $row2['countycode'];
                      echo '<meta http-equiv="refresh" content="3; url=../clerk/index.php">
                              <h1 align="center" class="border"><br><br><br><br>

                              <div style="margin:0 auto; text-align:center;">
                              Loading...
                              <??>
                              <br>
                              <img src="../dist/img/loading.gif" style="background-color:#eee;">
                              <br></div></h1>';
          }
        }
                        }
                        else{
                         header("location:../?login_err=Wrong Reset Password");
                        }


          }
          else{
                 header("location:../?login_err=Your Account Has Been Disabled. Please Contact Administrator for More Information");            
          }

          }
      } else {
         header("location:../?login_err=Your Account not found in database");
      }
      $conn->close();
      break;
    }
  
      default:
      {
        header("location:../index.php?login_err=No Role Assigned.");
        break;
      }
      }
    }
?>
