<?php
include 'check_login_agent.php';
include '../db_config/connection.php';
 if(isset($_POST["loadcounty"])){
 	$countycode=$_POST["countycode"];
$select="select * from county where countycode='$currentcountylogin' order by countycode asc";
$result=mysqli_query($conn,$select);
$output='';
$output.='<option value="">Select County</option>';
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $output.='<option value="'.$row["countycode"].'">'.$row["countyname"].'</option>';
    }
  }
  else {
    $output.='<option value="" Selected>No County Found</option>';
  }
echo $output;
 }

else if(isset($_POST["countycode"])){
	$select="select * from constituency where countycode='".$currentcountylogin."' && constituencycode='$currentconstituencylogin' order by constituencycode asc";
$result=mysqli_query($conn,$select);
$output='';
$output.='<option value="">Select Constituency</option>';
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $output.='<option value="'.$row["constituencycode"].'">'.$row["constituencyname"].'</option>';
    }
  }
  else {
    $output.='<option value="" Selected>No Constituency Found</option>';
  }
echo $output;
}
 ?>
