<?php
//$clerkid = $_GET['ref'];

//include 'check_login_clerk.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=$_SESSION['clerk_pollingstation'];
   $clerkid=$_SESSION['clerkid'] ;
  $currentwardlogin=$_SESSION['clerk_currentwardlogin'] ;
  $currentconstituencylogin=$_SESSION['clerk_currentconstituencylogin'];
    $currentcountylogin=$_SESSION['clerk_currentcountylogin'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
  $governorid = $_POST['governorid'];
  $nid = $_POST['nid'];
 
include '../db_config/connection.php';

//Check if voter has already voted for the governor
mysqli_autocommit($conn,false);
$sql1 = "SELECT * FROM votes where nid='$nid' and polling ='$pollingstation' and governor=0";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
         $sql = "UPDATE votes SET governor='$governorid' WHERE nid='$nid'  and polling ='$pollingstation'";
        if ($conn->query($sql) === TRUE) {
              //update polling station votes
                   $sql2 = "SELECT * FROM presiding_results where contestant='$governorid' and type='Governor' and polling ='$pollingstation'";
                    $presvoter=mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($presvoter)>0){
                    while($row2 = mysqli_fetch_array($presvoter)) {
                      $curvotes=$row2['votes'];
                      $updatevotes=$curvotes+1;
                         $sql = "UPDATE presiding_results SET votes='$updatevotes' WHERE contestant='$governorid' and type='Governor' and polling ='$pollingstation'";
                          if ($conn->query($sql) === TRUE) {
                             
                              //update ward votes
                                       $sqlward = "SELECT * FROM ward_results where contestant='$governorid' and type='Governor' and ward ='$currentwardlogin'";
                                        $presvoter=mysqli_query($conn,$sqlward);
                                        if(mysqli_num_rows($presvoter)>0){
                                        while($rowward = mysqli_fetch_array($presvoter)) {
                                          $curvotesward=$rowward['votes'];
                                          $updatevotesward=$curvotesward+1;
                                             $sql = "UPDATE ward_results SET votes='$updatevotesward' WHERE contestant='$governorid' and type='Governor' and ward ='$currentwardlogin'";
                                              if ($conn->query($sql) === TRUE) {
                                                   //update constituency votes
                                                         $sqlconstituency = "SELECT * FROM constituency_results where contestant='$governorid' and type='Governor' and constituency ='$currentconstituencylogin'";
                                                          $presvoter=mysqli_query($conn,$sqlconstituency);
                                                          if(mysqli_num_rows($presvoter)>0){
                                                          while($rowconstituency = mysqli_fetch_array($presvoter)) {
                                                            $curvotesconstituency=$rowconstituency['votes'];
                                                            $updatevotesconstituency=$curvotesconstituency+1;
                                                               $sql = "UPDATE constituency_results SET votes='$updatevotesconstituency' WHERE contestant='$governorid' and type='Governor' and constituency ='$currentconstituencylogin'";
                                                                if ($conn->query($sql) === TRUE) {
                                                                         //update county votes
                                                                       $sqlcounty = "SELECT * FROM county_results where contestant='$governorid' and type='Governor' and county ='$currentcountylogin'";
                                                                        $presvoter=mysqli_query($conn,$sqlcounty);
                                                                        if(mysqli_num_rows($presvoter)>0){
                                                                        while($rowcounty = mysqli_fetch_array($presvoter)) {
                                                                          $curvotescounty=$rowcounty['votes'];
                                                                          $updatevotescounty=$curvotescounty+1;
                                                                             $sql = "UPDATE county_results SET votes='$updatevotescounty' WHERE contestant='$governorid' and type='Governor' and county ='$currentcountylogin'";
                                                                              if ($conn->query($sql) === TRUE) {
                                                                                 $sql = "UPDATE voters SET votestatus=1 WHERE nid='$nid' ";
                                                                              if ($conn->query($sql) === TRUE) {
                                                                                mysqli_commit($conn);
                                                                                  echo " Governor Voting was Successfully";
                                                                              } 
                                                                              else {
                                                                                mysqli_rollback($conn);
                                                                                 echo "Failed Update Selected Governor Vote on voters list .Please Select and Vote Again";
                                                                              }
                                                                              } 
                                                                              else {
                                                                                mysqli_rollback($conn);
                                                                                 echo "Failed Update Selected Governor Vote .Please Select and Vote Again";
                                                                              }
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                      mysqli_rollback($conn);
                                                                      echo "The Selected Candidate Is Not Available Right Know. Please Refresh and Try Again";
                                                                    }
                                                        //
                                                                } 
                                                                else {
                                                                  mysqli_rollback($conn);
                                                                   echo "Failed Update Selected Governor Vote .Please Select and Vote Again";
                                                                }
                                                          }
                                                      }
                                                      else
                                                      {
                                                        mysqli_rollback($conn);
                                                        echo "The Selected Candidate Is Not Available Right Know. Please Refresh and Try Again";
                                                      }
                                          
                                              } 
                                              else {
                                                mysqli_rollback($conn);
                                                 echo "Failed Update Selected Governor Vote .Please Select and Vote Again";
                                              }
                                        }
                                    }
                                    else
                                    {
                                      mysqli_rollback($conn);
                                      echo "The Selected Candidate Is Not Available Right Know. Please Refresh and Try Again";
                                    }
                             
                          } 
                          else {
                            mysqli_rollback($conn);
                             echo "Failed Update Selected Governor Vote .Please Select and Vote Again";
                          }
                    }
                }
                else
                {
                  mysqli_rollback($conn);
                  echo "The Selected Candidate Is Not Available Right Know. Please Refresh and Try Again";
                }
                } 
          else {
            mysqli_rollback($conn);
             echo "Failed to Vote Selected Governor .Please Select and Vote Again";
          }
    }
}
else{
  mysqli_rollback($conn);
  echo "You Are Not Found In This Polling Station Voters Register";
}



?>
