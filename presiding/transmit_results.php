<?php
//$presidingid = $_GET['ref'];

//include 'check_login_presiding.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_presiding = $_SESSION['presiding_fullname'];
    $presidingid=$_SESSION['presidingid'] ;
  $currentpolling=$_SESSION['presiding_currentpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
include '../db_config/connection.php';
$type=$_POST['type'];
if($type=="President"){
  $sql2 = "SELECT * FROM presiding where id='$presidingid' && president='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
       $sql1 = "SELECT * FROM `president_votes` where polling='$currentpolling' group by president";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['president'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
           $sql = "UPDATE presiding SET president=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
             echo $votes." Votes has been Transmitted for Presidential Candidate ".$row1['president']."<hr>";
          } 
          else {
             echo "Failed to Transmit President list";
          }
                 
              }
            else {
            echo "Result Transmission Error for Presidential Candidate ".$row1['president']."<hr>";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }
    }
  }
  else{
    echo "Already President Results has been Transmitted";
  }
 
     $conn->close();
}
else if ($type=="Governor"){
  $sql2 = "SELECT * FROM presiding where id='$presidingid' && governor='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
 $sql1 = "SELECT * FROM `governor_votes` where polling='$currentpolling' group by governor";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['governor'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
           $sql = "UPDATE presiding SET governor=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
             echo $votes." Votes has been Transmitted for gubernotorial Candidate ".$row1['governor']." <hr>";
          } 
          else {
             echo "Failed to Transmit Governor results";
          }
                 
              }
            else {
            echo "Result Transmission Error for gubernotorial Candidate ".$row1['governor'].">hr> ";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }
      }
    }
        else{
    echo "Already Governor Results has been Transmitted";
  }
       
                     
             $conn->close();
}
else if ($type=="Senator"){

     $sql2 = "SELECT * FROM presiding where id='$presidingid' && senator='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
 $sql1 = "SELECT * FROM `senator_votes` where polling='$currentpolling' group by senator";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['senator'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
           $sql = "UPDATE presiding SET senator=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
             echo $votes." Votes has been Transmitted for Senatorial Candidate ".$row1['senator']." <hr>";
          } 
          else {
             echo "Failed to Transmit Senator results";
          }
                 
              }
            else {
            echo "Result Transmission Error for Senatorial Candidate ".$row1['senator'].">hr> ";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }
      }
    }
        else{
    echo "Already Senator Results has been Transmitted";
  }
     
       $conn->close();
}
else if ($type=="WomenRep"){
   $sql2 = "SELECT * FROM presiding where id='$presidingid' && womenrep='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
    $sql1 = "SELECT * FROM `womenrep_votes` where polling='$currentpolling' group by womenrep";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['womenrep'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
           $sql = "UPDATE presiding SET womenrep=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
               echo $votes." Votes has been Transmitted for womenrep Candidate ".$row1['womenrep']."<hr> ";
          } 
          else {
             echo "Failed to Transmit WomenRep results";
          }
               
              }
            else {
            echo "Result Transmission Error for womenrep Candidate ".$row1['womenrep']."<hr> ";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }
      }
    }
         else{
    echo "Already WomenRep Results has been Transmitted";
  }
             $conn->close();
}
else if ($type=="MP"){
   $sql2 = "SELECT * FROM presiding where id='$presidingid' && mp='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
    $sql1 = "SELECT * FROM `mp_votes` where polling='$currentpolling' group by mp";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['mp'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
           $sql = "UPDATE presiding SET mp=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
             echo $votes." Votes has been Transmitted for mp Candidate ".$row1['mp']."<hr> ";
          } 
          else {
             echo "Failed to Transmit mp results";
          }
                 
              }
            else {
            echo "Result Transmission Error for mp Candidate ".$row1['mp']."<hr> ";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }
      }
    }
         else{
    echo "Already MP Results has been Transmitted";
  }
             $conn->close();
}
else if ($type=="MCA"){
   $sql2 = "SELECT * FROM presiding where id='$presidingid' && mca='0'";
  $presvoter=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($presvoter)>0){
    while($row2 = mysqli_fetch_array($presvoter)) {
$sql1 = "SELECT * FROM `mca_votes` where polling='$currentpolling' group by mca";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $pres=$row1['mca'];
        $votes=$row1['votes'];
        $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,type,contestant,votes) VALUES ( '$currentpolling','$type','$pres','$votes') ") or die(mysqli_error($conn));
         if($result>0){
            $sql = "UPDATE presiding SET mca=1 WHERE id='$presidingid'";
          if ($conn->query($sql) === TRUE) {
             echo $votes." Votes has been Transmitted for mca Candidate ".$row1['mca']."<hr> ";
          } 
          else {
             echo "Failed to Transmit mca results";
          }
                 
              }
            else {
            echo "Result Transmission Error for mca Candidate ".$row1['mca']."<hr> ";
          }
        }
       }
       else{
        echo "No Candidate Found";
        }  
      }
    }
         else{
    echo "Already MCA Results has been Transmitted";
  }  
             $conn->close();
}

?>
