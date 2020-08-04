<?php
//include 'check_login_clerk.php';
include '../db_config/connection.php';
 session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=$_SESSION['clerk_pollingstation'];
   $clerkid=$_SESSION['clerkid'] ;
  $currentwardlogin=$_SESSION['clerk_currentwardlogin'] ;
  $currentconstituencylogin=$_SESSION['clerk_currentconstituencylogin'];
    $currentcountylogin=$_SESSION['clerk_currentcountylogin'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
 include '../db_config/connection.php';
  $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,ward.wardname,constituency.constituencycode,constituency.constituencyname,county.countycode,county.countyname FROM ward,polling,constituency,county where polling.pollingcode='$pollingstation' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode ";
            $result2 = $conn->query($sql2) or die(mysqli_error($conn));
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                  $county=$row2['countycode'];
                  $constituency=$row2['constituencycode'];
                  $ward=$row2['wardcode'];
                }
              }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | Voters Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../dist/css/custom.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <script type="text/javascript" src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <link rel="icon" href="../dist/img/icon.png">
</head>
<style type="text/css">
body{
  font-family: sans-serif;
}
  .container{
    width: 98%;
    //background-color: yellowgreen;
  }
  .containerr{
      width: 99%;
    margin-left: 0.5%;
    margin-right: 0.5%;
    text-align: center;
  //  background-color: green;
    border-radius: 9px 14px 14px 9px;
  }


  .containerr form table {
    width: 98%;
    margin-left: 1%;
    margin-right: 1%;
    border: 1px solid white;
    border-radius: 5px 10px 10px 5px;
  }
  .containerr form table tr td{
    border: 1px solid yellow;
    border-radius: 5px 10px 10px 5px;
    margin-top: 0%;
  }
  .containerr form table tr th{
    border: 2px solid white;
    border-radius: 5px 10px 10px 5px;
  }
  .President {
    color: black;
    background-color: #ff66ff;
      border-radius: 5px 10px 10px 5px
  }
  .Governor {
    color: black;
    background-color: #6666ff;
      border-radius: 5px 10px 10px 5px;
  }
  .Senator {
    color: black;
    background-color: #d98c8c;
      border-radius: 5px 10px 10px 5px;
  }
  .WomenRep {
    color: black;
    background-color: #b3ff66;
      border-radius: 5px 10px 10px 5px;
  }
 
  #tablehd{
    color:blue;
  }
  #vote{
			height: 40px;
			width: 40%;
			font-size: 25px;
			border-radius: 6px 5px 5px 6px;
			background-color: brown;
      color:white;
		}
    #foot{
      border-radius: 6px 5px 5px 6px;
      font-size: 20px;
    }
@media (max-width:300px){
   
  }
 
 
</style>

<script>

function showResult()
{
  var x=document.getElementById("president");
  var i;
  for(i=0; i>x.length; i++)
  {
    x[i].disabled=true;
  }
}
</script>
<script>
function getVote(String)
{

  if(window.XMLHttpRequest)
  {
    xmlhttp= new XMLHttpRequest();
  }
  else {
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(confirm("Your vote is for "+String))
  {
    window.alert("Thank you for voting. \n Your Vote Your Future.");

     document.getElementById('president').disabled=true;

    xmlhttp.open("GET", "presidentvote.php?uname="+String, true);
    xmlhttp.send();


    return true;
  }
  else {
    {
   alert("Choose another PRESIDENT of your choice");
   return false;
    }
  }
}
</script>

<script>
function getVotee(String)
{
  if(window.XMLHttpRequest)
  {
    xmlhttp= new XMLHttpRequest();
  }
  else {
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(confirm("Your vote is for "+String))
  {
    window.alert("Thank you for voting. \n Your Vote Your Future.");
    xmlhttp.open("GET", "governorvote.php?uname="+String, true);
    xmlhttp.send();
    return true;
  }
  else {
    {
   alert("Choose another GOVERNOR of your choice");
   return false;
    }
  }
}
</script>

<script>
function getVoteee(String)
{
  if(window.XMLHttpRequest)
  {
    xmlhttp= new XMLHttpRequest();
  }
  else {
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(confirm("Your vote is for "+String))
  {
    window.alert("Thank you for voting. \n Your Vote Your Future.");
    xmlhttp.open("GET", "senatorvote.php?uname="+String, true);
    xmlhttp.send();
    return true;
  }
  else {
    {
   alert("Choose another SENATOR of your choice");
   return false;
    }
  }
}
</script>

<script>
function getVoteeee(String)
{
  if(window.XMLHttpRequest)
  {
    xmlhttp= new XMLHttpRequest();
  }
  else {
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(confirm("Your vote is for "+String))
  {
    window.alert("Thank you for voting. \n Your Vote Your Future.");
    xmlhttp.open("GET", "womenrepvote.php?uname="+String, true);
    xmlhttp.send();
    return true;
  }
  else {
    {
   alert("Choose another WOMEN-REP of your choice");
   return false;
    }
  }
}
</script>

<body class="hold-transition skin-blue sidebar-mini">
<div class="container" style="background-image: url('../dist/img/small-iebc.jpg';margin-top:5px; background-repeat: repeat;background-size: contain;min-width: 300px; ">
 <?php

$nid=$_SESSION['voternid'];
if ($nid=="") {
  header("Location:index.php");
}
// $pollingstation=$_SESSION['clerk_pollingstation'];
// $clerkid=$_SESSION['clerkid'];
$conn = mysqli_connect("localhost","root","","amvs_system");
$voterdetail = mysqli_query($conn, "SELECT * FROM voters WHERE nid='$nid'") or die(mysqli_error($conn));
$votes=mysqli_fetch_array($voterdetail);
?>
  <div class="well pull-left bg-aqua" align="center" style="font-size: 200%;text-align: center;width: 100%;background-color: ;color: blue;">
  <div class="pull-left" style="width: 20%;min-width: 100px;">
    
<?php echo '<img src="../uploads/'.$votes['photo'].'" width="90px" height="60px" alt="'.$current_user.'" title="'.$current_user.'"/>';  ?>
  </div>
  <div class="pull-left" style="width: 60%;min-width: 150px;">
   <h4 align="center"><b>AMVSAutomated Voting</b> System</h4>
   <span>Full Names: <?php echo $votes['firstname'].' '.$votes['middlename'].' '.$votes['lastname'].'<br>Voter\'s ID: ('.$nid.')'; 
 ?></span>
</div>
 <div class="pull-left" style="width: 20%;min-width: 100px;">
      <button class="btn  btn-danger" id="endsessionbtn">END SESSION</button>
  </div>
   </div>
  <input type="hidden" name="nid" value="<?php echo $nid; ?>" id="nid" class="nid">
  <input type="hidden" name="clerkid" value=" <?php echo $clerkid; ?>" id="clerkid" class="clerkid">
  <input type="hidden" name="pollingstation" value="<?php echo $pollingstation; ?>" id="pollingstation" class="pollingstation">

        
  <?php
  include '../db_config/connection.php';
    $select_president="SELECT * FROM president Order by Sno";
    $select_governor="SELECT * FROM governor where countycode='$county'  Order by Sno";
    $select_senator="SELECT * FROM senator where countycode='$county' Order by Sno";
    $select_womenrep="SELECT * FROM womenrep where countycode='$county' Order by Sno";
    $select_mp="SELECT * FROM mp where constituencycode='$constituency' Order by Sno";
    $select_mca="SELECT * FROM mca where wardcode='$ward' Order by Sno";
   ?>
  <!-- create president panel -->

   <div class=" pull-left well " id="presdediv" style="margin-top:1%;width: 10%;min-width:190px;color: black;">
   <h4>Presidential</h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">
                
               <?php
    $output_president='';
    //select all presidential Candidates
      $result_president=mysqli_query($conn,$select_president);
      if(mysqli_num_rows($result_president)>0){
        $president_count=mysqli_num_rows($result_president);
        $output_president.=' <span style="font-size:24px;" class="badge"> '.$president_count.'</span> Found<br>
        <button class="votepresident btn btn-success btn-block" >Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_president)) {
          
        
        }
      } else{

          $output_president='No President Candidate Found';
        }
        echo $output_president;
      ?>
            
                </div>
                </div>
                <!-- end president panel -->
                  <!-- create governor panel -->
   <div class="pull-left well " id="goverdiv" style="margin-top:1%;width: 10%;min-width:190px;color: black;margin-left: 1%;">
   <h4>Gubernatorial</h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">
              
               <?php
    $output_governor='';
    //select all gubernatorial Candidates
      $result_governor=mysqli_query($conn,$select_governor);
      if(mysqli_num_rows($result_governor)>0){
        $governor_count=mysqli_num_rows($result_governor);
         $output_governor.=' <span style="font-size:24px;" class="badge"> '.$governor_count.'</span> Found<br>
        <button class="votegovernor btn btn-success btn-block" > Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_governor)) {
      
        }
      } else{

          $output_governor='No Governor Candidate Found';
        }
        echo $output_governor;
      ?>
             <!-- <button style="color:blue;">'.$row["partycode"].'</button> -->
                </div>
                </div>
                <!-- end governor panel -->
                                <!-- create senator panel -->
   <div class="pull-left well" id="senatdiv" style="margin-top:1%;width: 10%;min-width:190px;color: black;margin-left: 1%;">
   <h4>Senator </h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">
                
               <?php
    $output_senator='';
    //select all Senaterial Candidates
      $result_senator=mysqli_query($conn,$select_senator);
      if(mysqli_num_rows($result_senator)>0){
        $senator_count=mysqli_num_rows($result_senator);
         $output_senator.=' <span style="font-size:24px;" class="badge"> '.$senator_count.'</span> Found<br>
        <button class="votesenator btn btn-success btn-block" > Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_senator)) {
        
        }
      } else{

          $output_senator='No senator Candidate Found';
        }
        echo $output_senator;
      ?>
             <!-- <button style="color:blue;">'.$row["partycode"].'</button> -->
                </div>
                </div>
                <!-- end senator panel -->

                <!-- create womenrep panel -->
   <div class="pull-left well " id="womenrepdiv" style="margin-top:1%;width: 10%;min-width:190px;color: black;margin-left: 1%;">
   <h4>W.Rep </h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">
              
               <?php
    $output_womenrep='';
    //select all Senaterial Candidates
      $result_womenrep=mysqli_query($conn,$select_womenrep);
      if(mysqli_num_rows($result_womenrep)>0){
         $womenrep_count=mysqli_num_rows($result_womenrep);
         $output_womenrep.=' <span style="font-size:24px;" class="badge"> '.$womenrep_count.'</span> Found<br>
        <button class="votewomenrep btn btn-success btn-block" > Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_womenrep)) {
    
        }
      } else{

          $output_womenrep='No womenrep Candidate Found';
        }
        echo $output_womenrep;
      ?>
             <!-- <button style="color:blue;">'.$row["partycode"].'</button> -->
                </div>
                </div>
                <!-- end womenrep panel -->
                <!-- create mp panel -->
   <div class=" pull-left well" id="mpdiv" style="margin-top:1%;width: 10%;min-width:190px;color: black;margin-left: 1%;">
   <h4>MP </h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">
              
               <?php
    $output_mp='';
    //select all members of pariament Candidates
      $result_mp=mysqli_query($conn,$select_mp);
      if(mysqli_num_rows($result_mp)>0){
         $mp_count=mysqli_num_rows($result_mp);
         $output_mp.=' <span style="font-size:24px;" class="badge"> '.$mp_count.'</span> Found<br>
        <button class="votemp btn btn-success btn-block" > Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_mp)) {
    
        }
      } else{

          $output_mp='No mp Candidate Found';
        }
        echo $output_mp;
      ?>
             <!-- <button style="color:blue;">'.$row["partycode"].'</button> -->
                </div>
                </div>
                <!-- end mp panel -->
                <!-- create mca panel -->

   <div class=" pull-left well" id="mcadiv" style="margin-top:1%;width: 10%;min-width:190px;color: black;margin-left: 1%;">
   <h4>MCA </h4>
                <div class="pull-left panel" style="border-radius:15px 15px 15px 15px;color: black;width: 95%;">              
               <?php
    $output_mca='';
    //select all Member of county assemble Candidates
      $result_mca=mysqli_query($conn,$select_mca);
      if(mysqli_num_rows($result_mca)>0){
        $mca_count=mysqli_num_rows($result_mca);
         $output_mca.=' <span style="font-size:24px;" class="badge"> '.$mca_count.'</span> Found<br>
        <button class="votemca btn btn-success btn-block" > Vote</button>
        ';
        while ($row=mysqli_fetch_array($result_mca)) {
       
        }
      } else{

          $output_mca='No mca Candidate Found';
        }
        echo $output_mca;
      ?>
             <!-- <button style="color:blue;">'.$row["partycode"].'</button> -->
                </div>
                </div>
                <!-- end mca panel -->

                <div id="yourvotedchoices" class="pull-left well" style="width: 100%;min-width: 250px;" >
                <h4>Voters Choice of Candidates for Each Contestant</h4>
                   <div class="panel" >
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">President Vote: </button> <span class="presidentvoted " id="presidentvoted">
                <?php include '../db_config/connection.php';
                $votest="";
                              //$sql = "SELECT * FROM president_votes where nid='$nid' && polling='$pollingstation' && votes >1 ";
                               $sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && president !=0 ";
                                     $result = $conn->query($sql);
                                        if (mysqli_query($conn,$sql)) {
                                      while($row = $result->fetch_assoc()) {

                                        $presvoted= $row['president'];
                                         //selcet namre
                                         $sql1 = "SELECT * FROM president where  Sno ='$presvoted' ";
                                     $result1 = $conn->query($sql1);

                                        if (mysqli_query($conn,$sql1)) {
                                      while($row = $result1->fetch_assoc()) {
                                        $votest.= $row['uname'];
                                         ?>
                                  <script type="text/javascript">
                                  $(document).ready(function(){
                                   $("#presdediv").hide();
                                  });
                                </script>
                                <?php
                                       }
                                         } else {
                                          $votest.= "Information Not Found";
                                        }
                                         $conn->close();
                                        //
                                      }
                                         } else {
                          $votest.= "Not Voted";
                        } 
                        echo $votest;?>
                    </span>
                  </div>
                       <div class="panel" >
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">Governor Vote: </button> <span class="governorvoted " id="governorvoted">
                          <?php include '../db_config/connection.php';
                          $votest="Not Voted";
                          $sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && governor !=0 ";                     $result = $conn->query($sql);

                                                  if (mysqli_query($conn,$sql)) {
                                                while($row = $result->fetch_assoc()) {

                                                  $gonvoted= $row['governor'];
                                                 // echo $gonvoted;
                                                   //selcet namre
                                                   $sql1 = "SELECT * FROM governor where  Sno ='$gonvoted' ";
                                               $result1 = $conn->query($sql1);

                                                  if (mysqli_query($conn,$sql1)) {
                                                while($row = $result1->fetch_assoc()) {
                                                  echo $row['uname'];
                                                   ?>
                                            <script type="text/javascript">
                                            $(document).ready(function(){
                                             $("#goverdiv").hide();
                                            });
                                          </script>
                                          <?php
                                                 }
                                                   } else {
                                                    echo "Information Not Found";
                                                  }
                                                   $conn->close();
                                                  //
                                                }
                                                   } else {
                                                    echo "Not Voted";
                                                  } ?>
                          </span>
                  </div>
                       <div class="panel" >
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">Senator Vote: </button> <span class="senatorvoted " id="senatorvoted">
<?php include '../db_config/connection.php';
$votest="Not Voted";
             $sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && senator !=0 ";
                     $result = $conn->query($sql);

                        if (mysqli_query($conn,$sql)) {
                      while($row = $result->fetch_assoc()) {

                        $senvoted= $row['senator'];
                         //selcet namre
                         $sql1 = "SELECT * FROM senator where  Sno ='$senvoted' ";
                     $result1 = $conn->query($sql1);

                        if (mysqli_query($conn,$sql1)) {
                      while($row = $result1->fetch_assoc()) {
                        echo $row['uname'];
                         ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   $("#senatdiv").hide();
                  });
                </script>
                <?php
                       }
                         } else {
                          echo "Information Not Found";
                        }
                         $conn->close();
                        //
                      }
                         } else {
                          echo "Not Voted";
                        } ?>
    </span>
                  </div>
                       <div class="panel" >
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">Women Rep Vote: </button><span class="womenrepvoted " id="womenrepvoted">
<?php include '../db_config/connection.php';
$votest="Not Voted";
$sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && womenrep !=0 ";
                     $result = $conn->query($sql);

                        if (mysqli_query($conn,$sql)) {
                      while($row = $result->fetch_assoc()) {

                        $womvoted= $row['womenrep'];
                         //selcet namre
                         $sql1 = "SELECT * FROM womenrep where  Sno ='$womvoted' ";
                     $result1 = $conn->query($sql1);

                        if (mysqli_query($conn,$sql1)) {
                      while($row = $result1->fetch_assoc()) {
                        echo $row['uname'];
                         ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   $("#womenrepdiv").hide();
                  });
                </script>
                <?php
                       }
                         } else {
                          echo "Information Not Found";
                        }
                         $conn->close();
                        //
                      }
                         } else {
                          echo "Not Voted";
                        } ?>
    </span>
                  </div>
                       <div class="panel" >
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">MP Vote: </button> <span class="mpvoted " id="mpvoted">
<?php include '../db_config/connection.php';
$votest="Not Voted";
$sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && mp !=0 ";
                     $result = $conn->query($sql);

                        if (mysqli_query($conn,$sql)) {
                      while($row = $result->fetch_assoc()) {

                        $mvoted= $row['mp'];
                         //selcet namre
                         $sql1 = "SELECT * FROM mp where  Sno ='$mvoted' ";
                     $result1 = $conn->query($sql1);

                        if (mysqli_query($conn,$sql1)) {
                      while($row = $result1->fetch_assoc()) {
                        echo $row['uname'];
                         ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   $("#mpdiv").hide();
                  });
                </script>
                <?php
                       }
                         } else {
                          echo "Information Not Found";
                        }
                         $conn->close();
                        //
                      }
                         } else {
                          echo "Not Voted";
                        } ?>
    </span>
                  </div>
                       <div class="panel">
                    <button class="btn btn-default btn-success" style="min-width:150px;width:30%;border:1px solid #ddfada;">MCA Vote: </button> <span class="mcavoted " id="mcavoted">
<?php include '../db_config/connection.php';
$votest="Not Voted";
$sql = "SELECT * FROM votes where nid='$nid' && polling='$pollingstation' && mca !=0 ";
                     $result = $conn->query($sql);

                        if (mysqli_query($conn,$sql)) {
                      while($row = $result->fetch_assoc()) {

                        $mcvoted= $row['mca'];
                         //selcet namre
                         $sql1 = "SELECT * FROM mca where  Sno ='$mcvoted' ";
                     $result1 = $conn->query($sql1);

                        if (mysqli_query($conn,$sql1)) {
                      while($row = $result1->fetch_assoc()) {
                        echo $row['uname'];
                         ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   $("#mcadiv").hide();
                  });
                </script>
                <?php
                       }
                         } else {
                          echo "Information Not Found";
                        }
                         $conn->close();
                        //
                      }
                         } else {
                          echo "Not Voted";
                        } ?>
    </span>
                  </div>
                </div>
</div>
<!-- end of class conintainer -->
<div class="containerr">
      <footer style="background-color:aqua;" id="foot">
    <div class="pull-right hidden-xs">
      <b><b>AMVS@2018</b></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">AMVS Election System</a>.</strong> All rights
    reserved.
  </footer>   
         
</div>
 <!-- Modal -->
<div class="modal fade " id="myViewModal" tabindex="-1" role="dialog" aria-labelledby="myViewModalLabel" aria-hidden="false" data-backdrop="false"   ">
<div class="modal-dialog modal-lg " style="">
<div class="modal-content" style="background-color: #eee;" >
<div class="modal-header" style="background-color: cyan;color: white;" >
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myViewModalLabel">
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="myViewmsg" style="">

AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="viewpressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<!-- end of class containerr -->
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel">
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
AMVS Message Alert
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close
</button>
<button type="button" class="confirmyespresident btn btn-success" id="confirmyespresident">Vote President
</button>
<button type="button" class="confirmyesgovernor btn btn-success" id="confirmyesgovernor">Vote Governor
</button>
<button type="button" class="confirmyessenator btn btn-success" id="confirmyessenator">Vote Senator
</button>
<button type="button" class="confirmyeswomenrep btn btn-success" id="confirmyeswomenrep">Vote Women Rep
</button>
<button type="button" class="confirmyesmp btn btn-success" id="confirmyesmp">Vote MP
</button>
<button type="button" class="confirmyesmca btn btn-success" id="confirmyesmca">Vote MCA
</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->

<script>
$(document).ready(function())
{
  var j= jQuery.noConflict();
  j(document).ready(function()
{
  j(".presiding").everyTime(6000, function(i)
{
  j.ajax(
    {
      url: "admin/presiding.php",
      cache: false;
      success: function(html)
      {
        //alert("Thank you for voting.");
        j(".presiding").html(html)
      }
    }
  )
})
});
j('.presiding').css({color:green});
});
</script>

<script type="text/javascript">
var presidentid;
var president;
var governorid;
var governor;
var senatorid;
var senator;
var womenrepid;
var womenrep;
var mpid;
var mp;
var mcaid;
var mca;
        
  $(document).ready(function(){
    
  });

  //vote president
  $(document).on('click','.votepresidentbtn',function(){
           president= $(this).data("id2");
           presidentid=$(this).data("id1");
          $("#msg").html("You have Selected "+president+" as Your President");
          $("#myModalLabel").html("Confirm Voting President");
          $("#confirmyespresident").html("Vote For "+president+" as President");
           $("#confirmyespresident").show();
          $("#confirmyesgovernor").hide();
          $("#confirmyessenator").hide();
          $("#confirmyeswomenrep").hide();
          $("#confirmyesmp").hide();
          $("#confirmyesmca").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });
   //vote president
  $(document).on('click','.votepresident',function(){
    var president="president";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{president:president},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Presidential Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
          
          // $('#myModal').modal({keyboard: false})                
      });
     $('#confirmyespresident').click(function(){
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_president_vote.php",
        method:"POST",
        data:{presidentid:presidentid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyespresident").hide();
          $("#presdediv").html("Voted for "+president);
        $("#presidentvoted").html(president);
        }
      });
  });


  //vote govenor
  $(document).on('click','.votegovernorbtn',function(){
           governor= $(this).data("id2");
           governorid=$(this).data("id1");
        $("#governorvoted").html(governor);
          $("#msg").html("You have Selected "+governor+" as Your Governor");
          $("#myModalLabel").html("Confirm Voting Governor");
          $("#confirmyesgovernor").html("Vote For "+governor+" as Governor");
           $("#confirmyesgovernor").show();
           $("#confirmyespresident").hide();
          $("#confirmyessenator").hide();
          $("#confirmyeswomenrep").hide();
          $("#confirmyesmp").hide();
          $("#confirmyesmca").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });
  $(document).on('click','.votegovernor',function(){
    var governor="governor";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{governor:governor},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Gubernatorial Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
      });
     $('#confirmyesgovernor').click(function(){
          var clerkid= $("#clerkid").val();
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_governor_vote.php",
        method:"POST",
        data:{governorid:governorid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyesgovernor").hide();
          $("#goverdiv").html("Voted for "+governor);
        }
      });
  });

  //vote senator
  $(document).on('click','.votesenatorbtn',function(){
           senator= $(this).data("id2");
           senatorid=$(this).data("id1");
        $("#senatorvoted").html(senator);
          $("#msg").html("You have Selected "+senator+" as Your Senator");
          $("#myModalLabel").html("Confirm Voting Senator");
          $("#confirmyessenator").html("Vote For "+senator+" as Senator");
          $("#confirmyessenator").show();
           $("#confirmyespresident").hide();
          $("#confirmyesgovernor").hide();
          $("#confirmyeswomenrep").hide();
          $("#confirmyesmp").hide();
          $("#confirmyesmca").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });
  $(document).on('click','.votesenator',function(){
    var senator="senator";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{senator:senator},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Senaterial Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
      });
     $('#confirmyessenator').click(function(){
          var clerkid= $("#clerkid").val();
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_senator_vote.php",
        method:"POST",
        data:{senatorid:senatorid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyessenator").hide();
          $("#senatdiv").html("Voted for "+senator);
        }
      });
  });

  //vote women rep
  $(document).on('click','.votewomenrepbtn',function(){
           womenrep= $(this).data("id2");
           womenrepid=$(this).data("id1");
        $("#womenrepvoted").html(womenrep);
          $("#msg").html("You have Selected "+womenrep+" as Your Women Representative");
          $("#myModalLabel").html("Confirm Voting WomenRep");
          $("#confirmyeswomenrep").html("Vote For "+womenrep+" as WomenRep");
          $("#confirmyeswomenrep").show();
          $("#confirmyespresident").hide();
          $("#confirmyesgovernor").hide();
          $("#confirmyessenator").hide();
          $("#confirmyesmp").hide();
          $("#confirmyesmca").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });
  $(document).on('click','.votewomenrep',function(){
    var womenrep="womenrep";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{womenrep:womenrep},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Women Representative Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
      });
     $('#confirmyeswomenrep').click(function(){
          var clerkid= $("#clerkid").val();
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_womenrep_vote.php",
        method:"POST",
        data:{womenrepid:womenrepid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyeswomenrep").hide();
          $("#womenrepdiv").html("Voted for "+womenrep);
        }
      });
  });

  //vote mp
  $(document).on('click','.votempbtn',function(){
           mp= $(this).data("id2");
           mpid=$(this).data("id1");
        $("#mpvoted").html(mp);
          $("#msg").html("You have Selected "+mp+" as Your Member of Parliament");
          $("#myModalLabel").html("Confirm Voting Member of Parliament");
          $("#confirmyesmp").html("Vote For "+mp+" as MP");
           $("#confirmyesmp").show();
           $("#confirmyespresident").hide();
          $("#confirmyesgovernor").hide();
          $("#confirmyeswomenrep").hide();
          $("#confirmyessenator").hide();
          $("#confirmyesmca").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });

  $(document).on('click','.votemp',function(){
    var mp="mp";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{mp:mp},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Member of Parliament Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
      });
     $('#confirmyesmp').click(function(){
          var clerkid= $("#clerkid").val();
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_mp_vote.php",
        method:"POST",
        data:{mpid:mpid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyesmp").hide();
          $("#mpdiv").html("Voted for "+mp);
        }
      });
  });

  //vote mca
  $(document).on('click','.votemcabtn',function(){
           mca= $(this).data("id2");
           mcaid=$(this).data("id1");
        $("#mcavoted").html(mca);
          $("#msg").html("You have Selected "+mca+" as Your Member of County Assemble");
          $("#myModalLabel").html("Confirm Voting MCA");
          $("#confirmyesmca").html("Vote For "+mca+" as MCA");
          $("#confirmyesmca").show();
          $("#confirmyespresident").hide();
          $("#confirmyesgovernor").hide();
          $("#confirmyeswomenrep").hide();
          $("#confirmyessenator").hide();
          $("#confirmyesmp").hide();
           $("#myModal").modal('show'); 
          // $('#myModal').modal({keyboard: false})                
      });
  $(document).on('click','.votemca',function(){
    var mca="mca";
        $.ajax({
        url:"load_ballot_paper.php",
        method:"POST",
        data:{mca:mca},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Member of County Assemble Ballot Paper");
           $("#myViewModal").modal('show'); 
        }
      });
      });
     $('#confirmyesmca').click(function(){
          var clerkid= $("#clerkid").val();
            var nid= $("#nid").val();
             var pollingstation= $("#pollingstation").val();
       $.ajax({
        url:"save_mca_vote.php",
        method:"POST",
        data:{mcaid:mcaid,nid:nid},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Voting Message");
          $("#confirmyesmca").hide();
          $("#mcadiv").html("Voted for "+mca);
        }
      });
  });

  $("#viewpressokay").click(function(){
    window.location="voters_page.php";
     });
 
</script>
<script type="text/javascript">
   $("#endsessionbtn").click(function(){
   window.location="index.php";
     });

</script>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
