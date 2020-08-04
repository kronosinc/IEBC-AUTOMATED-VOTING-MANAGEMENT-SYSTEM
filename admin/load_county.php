<?php
include '../db_config/connection.php';
$select="select * from county order by countycode asc";
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

 ?>
