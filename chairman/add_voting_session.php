<?php
include '../db_config/connection.php';
if(isset($_POST['addvotingdate']))
{
  $activity=$_POST['activityvoting'];

  $enddate=date_create($_POST['enddatevoting']);
   $startdate=date_create($_POST['startdatevoting']);
 $startdatefull=date_format($startdate,'Y-m-d ').$_POST['starttimevoting'];
 $enddatefull=date_format($enddate,'Y-m-d ').$_POST['endtimevoting'];
$resultsession = mysqli_query($conn,"SELECT `id`, `StartDate`, `EndDate`, `Activity`, `Type`, `AddedTime` FROM `votingsession`" ) or die(mysqli_error($conn));
if (mysqli_num_rows($resultsession)>0) {
  echo "Failed To Add Session.Another session is Detected. Please Delete it before Adding Any";
}
else{
  $result = mysqli_query($conn, "INSERT INTO votingsession( StartDate,EndDate,Activity,Type ) VALUES ('$startdatefull','$enddatefull','$activity','Voting')" ) or die(mysqli_error($conn));
    if($result>0)
    {
    echo "VOTTING SESSION details Set successfully!!";
    }
    else {
    echo "Voting session failed. Try again!!";
    }
}
//$duration=$_POST['durationvoting'];

}

?>
