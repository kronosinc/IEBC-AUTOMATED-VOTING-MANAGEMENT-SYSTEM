<div class="well pull-left" style="width:100%;height: 90%;min-height: px;background-color: #1f3f24;color: white;">
<?php

echo "Updated Voters <br>"; 
echo ".............................................................................................................................................. <br>"; 
//include 'check_login_php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $myusername = $_SESSION['chairman_username'];
  $current_user = $_SESSION['chairman_fullname'];
   //$clerkid=$_SESSION['clerkid'] ;
//$currentpolling=$_SESSION['presiding_currentpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
 //update voters list on voters register
      //select all voters 
      $voters="SELECT * FROM voters order by Sno";
      $resultvoters=mysqli_query($conn,$voters);
      $totalvoters=mysqli_num_rows($resultvoters);
      if ($totalvoters>0) {
        while ($votersrecords=mysqli_fetch_array($resultvoters)) {
          $votersnid=$votersrecords['nid'];
          $polling=$votersrecords['polling'];
            $votes="SELECT * FROM votes where nid='$votersnid' order by Sno";
      $resultvotes=mysqli_query($conn,$votes);
      $totalvotes=mysqli_num_rows($resultvotes);
      //echo $totalvotes;
      if ($totalvotes>0) {
         echo "Voter ".$votersrecords['firstname']." ".$votersrecords['lastname']." Is Already In the Voters Register<br>";
        //echo $votersnid."<br>";
          }
          else
            {
             
               $result = mysqli_query($conn, "INSERT INTO votes( nid, polling ) VALUES ( '$votersnid', '$polling')  ") or die(mysqli_error($conn));
                if($result>0)
                  {
                     echo "Voter ".$votersrecords['firstname']." ".$votersrecords['lastname']." Has Been Added to Voters Register<br>";
                  }
                  else
                  {
                    echo "Voter ".$votersrecords['firstname']." ".$votersrecords['lastname']." Was Not Added to the Voters Register<br>";
                  }
              
         
            }
        }
      }
      else
      {
          echo "No Voter Found";
      }
       echo "<hr>";   
?>
</div>