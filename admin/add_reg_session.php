<?php
include '../db_config/connection.php';
if(isset($_POST['addregdate']))
{
 $activity="Extended Registration";
  $enddate=date_create($_POST['enddatereg']);
   $startdate=date_create($_POST['startdatereg']);
 $startdatefull=date_format($startdate,'Y-m-d ').$_POST['starttimereg'];
 $enddatefull=date_format($enddate,'Y-m-d ').$_POST['endtimereg'];
//$duration=$_POST['durationvoting'];
$result = mysqli_query($conn, "INSERT INTO votingsession( StartDate,EndDate,Activity,Type) VALUES ('$startdatefull','$enddatefull','$activity','Registration')" ) or die(mysqli_error($conn));
    if($result>0)
    {
     echo "REGISTRATION SESSION details uploaded successfully!!";
    }
    else {
    echo "Upload failed. Try again!!";
    }
}

?>
