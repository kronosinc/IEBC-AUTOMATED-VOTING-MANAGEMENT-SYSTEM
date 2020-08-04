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
  $mcaid = $_POST['mcaid'];
  $nid = $_POST['nid'];
 
include '../db_config/connection.php';

mysqli_autocommit($conn,false);

//Check if voter has already voted for the mca

$sql1 = "SELECT * FROM votes where nid='$nid' and polling ='$pollingstation' and mca=0";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
         $sql = "UPDATE votes SET mca='$mcaid' WHERE nid='$nid'  and polling ='$pollingstation'";
        if ($conn->query($sql) === TRUE) {
              //update polling station votes
                   $sql2 = "SELECT * FROM presiding_results where contestant='$mcaid' and type='MCA' and polling ='$pollingstation'";
                    $presvoter=mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($presvoter)>0){
                    while($row2 = mysqli_fetch_array($presvoter)) {
                      $curvotes=$row2['votes'];
                      $updatevotes=$curvotes+1;
                         $sql = "UPDATE presiding_results SET votes='$updatevotes' WHERE contestant='$mcaid' and type='MCA' and polling ='$pollingstation'";
                          if ($conn->query($sql) === TRUE) {
                             
                              //update ward votes
                                       $sqlward = "SELECT * FROM ward_results where contestant='$mcaid' and type='MCA' and ward ='$currentwardlogin'";
                                        $presvoter=mysqli_query($conn,$sqlward);
                                        if(mysqli_num_rows($presvoter)>0){
                                        while($rowward = mysqli_fetch_array($presvoter)) {
                                          $curvotesward=$rowward['votes'];
                                          $updatevotesward=$curvotesward+1;
                                             $sql = "UPDATE ward_results SET votes='$updatevotesward' WHERE contestant='$mcaid' and type='MCA' and ward ='$currentwardlogin'";
                                              if ($conn->query($sql) === TRUE) {
                                                 $sql = "UPDATE voters SET votestatus=1 WHERE nid='$nid' ";
                                                                              if ($conn->query($sql) === TRUE) {
                                                                                mysqli_commit($conn);
                                                                                  echo " MCA Voting was Successfully";
                                                                              } 
                                                                              else {
                                                                                mysqli_rollback($conn);
                                                                                 echo "Failed Update Selected MCA Vote on voters list .Please Select and Vote Again";
                                                                              }
                                          
                                              } 
                                              else {
                                                 mysqli_rollback($conn);
                                                 echo "Failed Update Selected MCA Vote .Please Select and Vote Again";
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
                             echo "Failed Update Selected MCA Vote .Please Select and Vote Again";
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
             echo "Failed to Vote Selected MCA .Please Select and Vote Again";
          }
    }
}
else{
   mysqli_rollback($conn);
  echo "You Are Not Found In This Polling Station Voters Register";
}


?>
