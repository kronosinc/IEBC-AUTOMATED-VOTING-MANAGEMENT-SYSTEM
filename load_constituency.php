<?php
include 'db_config/connection.php';
$countycode=$_POST["countycode"];
$select="select * from constituency where countycode='".$countycode."' order by constituencycode asc";
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

 ?>
