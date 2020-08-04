<?php


//include 'check_login_php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_presiding = $_SESSION['presiding_fullname'];
   //$clerkid=$_SESSION['clerkid'] ;
  $currentpolling=$_SESSION['presiding_currentpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
//select all president lists
$sql1 = "SELECT * FROM president ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for president
     $president=$row['Sno'];
      $sql2 = "SELECT * FROM president_votes where president='$president' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
          echo "President ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO president_votes( polling, president,votes ) VALUES ('$currentpolling','$president',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "President ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "President updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No President Found<br>";
}
echo "<hr>";
//select all governor lists
$sql1 = "SELECT * FROM governor ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for governor
     $governor=$row['Sno'];
      $sql2 = "SELECT * FROM governor_votes where governor='$governor' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
           echo "Governor ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO governor_votes(  polling, governor,votes ) VALUES ('$currentpolling','$governor',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "Governor ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "Governor updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No Governor Found<br>";
}
echo "<hr>";
//select all senator lists
$sql1 = "SELECT * FROM senator ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for senator
     $senator=$row['Sno'];
      $sql2 = "SELECT * FROM senator_votes where senator='$senator' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
           echo "senator ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO senator_votes(  polling, senator,votes ) VALUES ('$currentpolling','$senator',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "senator ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "senator updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No senator Found<br>";
}
echo "<hr>";
//select all womenrep lists
$sql1 = "SELECT * FROM womenrep ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for womenrep
     $womenrep=$row['Sno'];
      $sql2 = "SELECT * FROM womenrep_votes where womenrep='$womenrep' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
           echo "womenrep ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO womenrep_votes(  polling, womenrep,votes ) VALUES ('$currentpolling','$womenrep',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "womenrep ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "womenrep updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No womenrep Found<br>";
}
echo "<hr>";
//select all mp lists
$sql1 = "SELECT * FROM mp ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for mp
     $mp=$row['Sno'];
      $sql2 = "SELECT * FROM mp_votes where mp='$mp' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
           echo "mp ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO mp_votes(  polling, mp,votes ) VALUES ('$currentpolling','$mp',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "mp ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "mp updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No mp Found<br>";
}
echo "<hr>";
//select all mca lists
$sql1 = "SELECT * FROM mca ORDER BY Sno";
$resultvoter=mysqli_query($conn,$sql1);
if(mysqli_num_rows($resultvoter)>0){
    while($row = mysqli_fetch_array($resultvoter)) {
          //update votes for mca
     $mca=$row['Sno'];
      $sql2 = "SELECT * FROM mca_votes where mca='$mca' && polling='$currentpolling' ORDER BY Sno";
      $presvoter=mysqli_query($conn,$sql2);
      if(mysqli_num_rows($presvoter)>0){
           echo "mca ".$row['uname']." is on Ballot Page<br>";
        }
      else{
         $result = mysqli_query($conn, "INSERT INTO mca_votes(  polling, mca,votes ) VALUES ('$currentpolling','$mca',0) ") or die(mysqli_error($conn));
              if($result>0)
              {
               echo "mca ".$row['uname']." votes Status Updated successfully<br>";
              }
              else {
                 echo "mca updating of votes Failed<br>";
              }
      }
       }
     }
else{
  echo "No mca Found<br>";
}
echo "<hr>";
?>