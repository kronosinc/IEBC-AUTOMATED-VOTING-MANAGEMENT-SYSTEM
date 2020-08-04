<?php
include '../db_config/connection.php';
if(isset($_POST['addregdate']))
{
  $activity=$_POST['activity'];

  $enddate=date_create($_POST['enddatereg']);
   $startdate=date_create($_POST['startdatereg']);
 $startdatefull=date_format($startdate,'Y-m-d ').$_POST['starttimereg'];
 $enddatefull=date_format($enddate,'Y-m-d ').$_POST['endtimereg'];
//$duration=$_POST['durationvoting'];
 $resultsession = mysqli_query($conn,"SELECT `id`, `StartDate`, `EndDate`, `Activity`, `Type`, `AddedTime` FROM `votingsession`" ) or die(mysqli_error($conn));
if (mysqli_num_rows($resultsession)>0) {
  echo "Failed To Add Session.Another session is Detected. Please Delete it before Adding Any";
}
else{
$result = mysqli_query($conn, "INSERT INTO votingsession( StartDate,EndDate,Activity,Type ) VALUES ('$startdatefull','$enddatefull','$activity','Registration')" ) or die(mysqli_error($conn));
    if($result>0)
    {
    echo "Registration SESSION details Set successfully!!";
    }
    else {
    echo "Registration session failed. Try again!!";
    }
}
}
?>
