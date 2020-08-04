<?php
include '../db_config/connection.php';
$constituencycode = $_POST['constituencycode'];
$select="select * from ward where constituencycode='".$constituencycode."' order by wardcode asc";
$result=mysqli_query($conn,$select);
$output='';
$output.='<option value="">Select Ward</option>';
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $output.='<option value="'.$row["wardcode"].'">'.$row["wardname"].'</option>';
    }
  }
  else {
    $output.='<option value="" Selected>No Ward Found</option>';
  }
echo $output;

 ?>
