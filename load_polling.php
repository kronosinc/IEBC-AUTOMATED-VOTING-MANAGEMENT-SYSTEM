<?php
include 'db_config/connection.php';
$wardcode = $_POST['wardcode'];
$select="select * from polling where wardcode='".$wardcode."' order by pollingcode asc";
$result=mysqli_query($conn,$select);
$output='';
$output.='<option value="">Select Polling Station</option>';
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $output.='<option value="'.$row["pollingcode"].'">'.$row["pollingname"].'</option>';
    }
  }
  else {
    $output.='<option value="" Selected>No Polling Station Found</option>';
  }
echo $output;

 ?>
