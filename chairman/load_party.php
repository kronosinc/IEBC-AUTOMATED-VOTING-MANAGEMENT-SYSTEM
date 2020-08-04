<?php
include '../db_config/connection.php';
$party=$_POST['party'];
$select="select * from party order by partycode asc";
$result=mysqli_query($conn,$select);
$output='';
$output.='<option value="">Select Party</option>';
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
    	if ($row["partycode"]==$party) {
    		 $output.='<option value="'.$row["partycode"].'" Selected>'.$row["partyname"].'</option>';
    	}
    	else{
    		$output.='<option value="'.$row["partycode"].'">'.$row["partyname"].'</option>';
    	}
      
    }
  }
  else {
    $output.='<option value="" Selected>No Party Found</option>';
  }
echo $output;

 ?>
