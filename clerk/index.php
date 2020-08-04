<?php
//include 'check_login_agent.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['clerk_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=  $_SESSION['clerk_pollingstation'] ;
  $pollingname=  $_SESSION['clerk_pollingname'] ;
    $clerkid=$_SESSION['clerkid'];
    $_SESSION['voternid']="";
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | Clerk Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
<script type="text/javascript" src="../Responsive-Fullscreen-Modal-Plugin-For-Bootstrap-3-4/dist/bs-modal-fullscreen.js" ></script>
    <link rel="icon" href="../dist/img/icon.png">
  <style type="text/css">
      thead tr {
        background-color: grey;
      }
       
    </style>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        var oTable = $('#example').dataTable();
        var oSettings = oTable.fnSettings();
        var iStart = new Date().getTime();
        
        for ( var i=0, iLen=100 ; i<iLen ; i++ )
        {
        console.profile( );
          oTable.fnSort( [[1, 'asc']] );
          oTable.fnSort( [[0, 'asc']] );
        console.profileEnd( );
        } 
        
        var iEnd = new Date().getTime();
        document.getElementById('output').innerHTML = "Test took "+(iEnd-iStart)+"mS";
      } );

    </script>

    <style>
    #body {

        background: #f6f6f6;
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
      text-align: center;
      background: #ddd;
      border: 1px solid #999;
      padding:2px;
      box-shadow: 0 0 7px 5px #ccc;
    font-size: 10px;
    }
    .info{
      font-size: 12px;
    }
.Duration{
  display: none;
}
    #header {
      background-color: #005cb7;
      color: white;
    }
    .clockStyle{
      font-size: 13px;
      margin: 0 auto;
      color: white;
      font-weight: bold;
      text-align: center;
    }

    </style>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header clockStyle">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>MVS</span>
      <span class="logo-lg"><b>Automated Voting</b> System</span>
    </a>
    <nav class="navbar navbar-static-top"><h id="clockDisplay"></h>
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

  <?php
 include '../db_config/connection.php';
			  $sql = "SELECT * FROM clerk where email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
				 $gender = $row['gender'];
				 $regid = $row['nid'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }

				 }else{
					   echo '<img src="../uploads/'.$row['photo'].'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {

                  }
                   $conn->close();

			  ?>

              <span class="hidden-xs"><?php echo"$current_user"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
			  <?php
			  include '../db_config/connection.php';

			  $sql = "SELECT * FROM clerk where email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
				 $gender = $row['gender'];
				 $regid = $row['nid'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }

				 }else{
					  echo '<img src="../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {

                  }
                   $conn->close();

			  ?>


                <p>
                  <?php echo"$current_user"; ?>
                  <small><?php echo"$regid"; ?> , Clerk</small>
                </p>
              </li>

              <li class="user-footer" style="background-color: gray;">
                <div class="pull-left">
                  <a id="clerk_profile" class="btn btn-primary btn-flat bg">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat bg">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar" style="background-color: #41f479;opacity: 0.95;">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <?php
        include '../db_config/connection.php';

        $sql = "SELECT * FROM clerk where  email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
         $gender = $row['gender'];
         $regid = $row['nid'];
         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }

         }else {
            echo '<img style="height:40px;" src="../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>
        </div>
        <div class="pull-left info" style="margin-top:4%;">
          <p><?php echo "$current_user"; ?></p>
        </div>
      </div>
      <ul class="sidebar-menu" style="">
      <li class="header glyphicon glyphicon-menu-hamburger" style="color:white;width: 100%;background-color:#1f3f24;"><b> NAVIGATION PANEL</b></li>
      <div id="" class="well " style="width: 30%;min-width: 230px;margin-top: 1%;"> 
  <h class="well btn-primary" style="font-size: 20px;margin-left: -11%;"><marquee>...Cast Your Vote Now...</marquee></h>

   </div>
      
<div id="loadchairsessionvoting" class="well pull-left" style="width: 30%;min-width: 230px;margin-top: -6%;"> 
  
   </div>

      </ul>
    </section>

  </aside>


  <div class="content-wrapper well" style="background-color:;">

     <section class="content-header well" style="padding: 1px;margin-top: -1.7%;">
      <h1>
        <p class="glyphicon glyphicon-dashboard " style="font-size:20px;"></p><b style="font-size:18px;"><i> Clerk Dashboard</b></i>

      </h1>
      <ol class="breadcrumb" style="margin-top: -2.4%;">
        <li><i class="fa fa-dashboard btn btn  glyphicon glyphicon-th-large"> Polling Station: <?php  echo $pollingname; ?></i></li>
        <!-- <li><a href=""><i class="fa fa-dashboard btn btn-primary  glyphicon glyphicon-th-large"> Results</i> </a></li> -->
        <li><a href=""><i class=" btn btn active"> Dashboard</i> </a></li>
      </ol>
    </section>

    <!--  end of breadcrumbs-->
      <div class="well pull-left" style="width: 45%;min-width: 300px;margin-top: -1.8%;" id="votingsessionstarted">
          
                <?php
 include '../db_config/connection.php';

 $type=$_SESSION['votingsession'];
$output='';
if ($type=="Voting") {
                  echo '
                  <div class="box-header bg-gray panel">
                    <i class="fa fa-graduation-cap"></i>

                      <h3 class="box-title glyphicon glyphicon-qrcode"id="h3validatevoter"style="color:green;" ></h3><b> VOTER ID Validation</b>
                      <h3 class="box-title glyphicon glyphicon-qrcode"id="h3validatevoter"style="float:right;color:green;" ></h3><b  style="float:right;"> Voter<h style="color:gray;">_</h> </b>
                  </div>
                  <hr id="hrvalidate">
                  <div class="badge" style="width:100%;">
                    <div class=" col-lg-12 ">
                    <!-- voter validation here -->
                    <div class="form-group" id="divvalidatevoter">
                    <form action="" method="POST" id="votervalidationform" name="votervalidationform">'
                      . '<h3 style="font-size:14px;">Please Input Voter ID To Proceed.</h3><br>'
                      .'<div class="form-group has-feedback col-lg-11" style="margin-left:4%;margin-bottom:4%;">
                          <label>National ID</label>
                        <input type="text" class="form-control" name="nid" id="nid" placeholder="Enter National ID" maxlength="8" minlength="8" required>
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:red;"></span>
                      </div>
                        <button  class=" btn btn-default btn-warning btn-block glyphicon glyphicon-hand-right " name="validatevoter" id="validatevoter"> Proceed To Validate ID
                          <i class="fa fa-arrow-circle-up "></i></button>
                    </form>
                    </div>
                    </div>

                    </div>
                   
                     ';
                    
          }
           else if ($type=="Registration") 
            {
          
                $output.=' <div class="panel" style="height:90%;padding:2px;"> 
                 
                <form action="" method="post" name="addvoterform" id="addvoterform" enctype="multipart/form-data">
               <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="middlename" placeholder="Middle Name" >
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="nid" placeholder="National ID" maxlength="8" minlength="8" required>
                </div>
                <div class="form-group" required>
                          <input type="radio"  name="gender" value="Male" >Male
                          <input type="radio"  name="gender" value="Female" >Female
                        </div>
              <div class="form-group">
                <select class="form-control" name="county" id="countycode" required>
                  <option>Choose County</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="constituency" id="constituencycode" required>
                  <option>Choose County First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="ward" id="wardcode" required>
                    <option>Choose constituency First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="polling" id="pollingcode" >
                  <option>Choose Ward First</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>
                <input type="file" class="form-control" name="photo" accept="photo/*" onchange="loadFile(event)" required><img id="output" width="100px" height="50px"/><br>
              </div>
           

            <div class="box-footer clearfix"style="background-image: url("../dist/img/purty_wood.png");background-repeat: no-repeat;  background-size: cover;background-position: center;">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send " name="addvoter" id="addvoter"> Register Voter
                <i class="fa fa-arrow-circle-up "></i></button>
            </div>

      </form>
    </div> ';

    echo $output;
  
  }

?>
        </div>
        <div class="well pull-right" style="width: 50%;min-width: 300px;margin-top: -1.8%;" id="votingsessionprogress">
              <?php

 include '../db_config/connection.php';
//display Presidings
 if ($type=="Voting") {
    $selectvoted="select * from voters where polling='$pollingstation' && votestatus=1 ORDER BY Sno";
  $resultvoted=mysqli_query($conn,$selectvoted) or die(mysqli_erro($conn));
  $voted=mysqli_num_rows($resultvoted);

   $selectnotvoted="select * from voters where polling='$pollingstation' && votestatus='0' ORDER BY Sno";
  $resultnotvoted=mysqli_query($conn,$selectnotvoted) or die(mysqli_erro($conn));
  $notvoted=mysqli_num_rows($resultnotvoted);
  $select="select * from voters where polling='$pollingstation' ORDER BY Sno";
  $result=mysqli_query($conn,$select);
  $total=mysqli_num_rows($result);
  $votper= ($voted/$total)*100;
  $notvotper= ($notvoted/$total)*100;
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption>All Voters in Your Polling Station:('.$pollingname.') <span class="badge">'.mysqli_num_rows($result).' </span> <br>Voted: <span class="badge">'.$voted.'</span> Percentage Voted: '.$votper.'%<span class="badge"></span> <br>Not Voted: <span class="badge">'.$notvoted.'</span> Percentage Not Voted: '.$notvotper.'%</caption><thead><tr>
          <th>SNo</th>
          <th>Name</th>
          <th>Photo</th>
          <th>Gender</th>
          <th>Status</th>
    </tr></thead><tbody>';
    $count=0;
      while($row=mysqli_fetch_array($result)){
        $status='';
        if ($row['votestatus']==1) {
            $status="Voted" ;           
        }
        else{
            $status="Not Voted";
        }
        ++$count;
      $output.='<tr style="background-color: #eee;">
        <td>'.$count.'</td>
      <td>'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</td>
      <td><img width="30px" height"30px" src="../uploads/'.$row['photo'].'"></td>
      <td>'.$row['gender'].'</td>
       <td>'.$status.'</td>
      </tr>';
    }
    $output.='</tbody>


    </table>';
    echo $output;
    
  }
}
else if ($type=="Registration") {
 



  $select="select * from voters where polling='$pollingstation' ORDER BY Sno";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption>All Voters in Your Polling Station:('.$pollingname.') <span class="badge">'.mysqli_num_rows($result).'</span></caption><thead><tr>
 <th>SNo</th>
          <th>Name</th>
          <th>Photo</th>
          <th>Gender</th>
          <th>Card</th>
    </tr></thead><tbody>';
    $count=0;
      while($row=mysqli_fetch_array($result)){
        ++$count;
      $output.='<tr style="background-color: #eee;">
        <td>'.$count.'</td>
      <td>'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</td>
      <td><img width="30px" height"30px" src="../uploads/'.$row['photo'].'"></td>
      <td>'.$row['gender'].'</td>';
           $status='';
        if ($row['voterscard']=="Printed") {
              $output.='<td><button class="btn disabled btn-info btn-block " data-id1="'.$row['nid'].'" data-id2="'.$row['firstname']. '">Printed</button></td>
      </tr>';         
        }
        else{
          $output.='<td><a href="printvoter.php?Sno='.$row['Sno'].'" target="_blank"><button class="btn  btn-info btn-block editvoter" data-id1="'.$row['nid'].'" data-id2="'.$row['firstname']. '">Print</button></a></td>
      </tr>';      
        }
    
    }
    $output.='</tbody>


    </table>';
    echo $output;
    
  }
}

    ?>
  
        </div>
        <!-- voting session -->


  </div>


  <footer class="main-footer " style="margin-top: -1.7%;background-color: #41f467;">
    <div class="pull-right hidden-xs">
      <b><b>AMVS@2018</b></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">AMVS Election System</a>.</strong> All rights
    reserved.
  </footer>

      </div>
    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
</div>
<!-- Modal -->
<div class="modal fade " id="myViewModal" tabindex="-1" role="dialog" aria-labelledby="myViewModalLabel" aria-hidden="false" data-backdrop="false"   ">
<div class="modal-dialog " style="">
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

<h1 align="center" class="border"><br><br><br><br>
    <div style="margin:0 auto; text-align:center;">
    Loading...
    <??>
    <br>
    <img src="../dist/img/loading.gif" >
    <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="viewpressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
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
<h1 align="center" class="border"><br><br><br><br>
    <div style="margin:0 auto; text-align:center;">
    Loading...
    <??>
    <br>
    <img src="../dist/img/loading.gif" >
    <br></div></h1>
</div>
<!-- <div class="modal-body" id="transmitcodediv">
<span>Enter Transmission Code:</span>
  <div class="form-group has-feedback">
      <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>
      <input type="text" class="form-control" name="transmitcode" placeholder="Enter Transmission Code Here" maxlength="10" minlength="10" required>
    </div>
</div> -->
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close
</button>
<button type="button" class="confirmresultstransmission btn btn-primary" id="confirmresultstransmission">Transmit Result
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->
<!-- Modal -->
<div class="modal fade" id="serverreplay" tabindex="-1" role="dialog" aria-labelledby="servermodallabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="servermodallabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="replaymsg" style="color:black;">
<h1 align="center" class="border"><br><br><br><br>
    <div style="margin:0 auto; text-align:center;">
    Loading...
    <??>
    <br>
    <img src="../dist/img/loading.gif" >
    <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="closeokay">Close
</button>
<button type="button" class="btn btn-default" data-dismiss="modal" id="okay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
function countdown(){
  var now = new Date();
  var eventDate = new Date(2018, 08, 08);

  var currentTiime = now.getTime();
  var eventTime = eventDate.getTime();

  var remTime = eventTime - currentTiime;

  var s = Math.floor(remTime / 1000);
  var m = Math.floor(s / 60);
  var h = Math.floor(m / 60);
  var d = Math.floor(h /24);

  h %= 24;
  m %= 60;
  s %= 60;

  h = (h < 10) ? "0" + h : h;
  m = (m < 10) ? "0" + m : m;
  s = (s < 10) ? "0" + s : s;

  document.getElementById('days').textContent = d;
  document.getElementById('days').innerText = d;

  document.getElementById('hours').textContent = h;
  document.getElementById('minutes').textContent = m;
  document.getElementById('seconds').textContent = s;

  setTimeout(countdown, 1000);
}
countdown();
</script>

<script>
function renderTime() {
  var currentTime = new Date();
  var diem = "AM";
  var h = currentTime.getHours();
  var m = currentTime.getMinutes();
  var s = currentTime.getSeconds();

  if (h == 0) {
    h = 12;
  }else if (h > 12) {
    h = h - 12;
    diem = "PM";
  }
  if(h < 10){
    h = "0" + h;
  }
  if(m < 10){
    m = "0" + m;
  }
  if(s < 10){
    s = "0" + s;
  }
  var myClock = document.getElementById('clockDisplay');
  myClock.textContent = h + ":" + m + ":" + s + "" + diem;
  myClock.innerText = h + ":" + m + ":" + s + "" + diem;
  setTimeout('renderTime()',1000);
}
renderTime();
</script>
<script type="text/javascript">
//create view clerk profile modal
var currentTime = new Date();
    var curt=currentTime.getHours();
    setInterval(function(){
      $('#loadchairsessionvoting').load('load_chair_session.php?ref='+curt)
    },1000);

$("#votervalidationform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      // $('#myModal').modal({"backdrop":"static"});
     $.ajax({
              url:"voter_validate.php",
              type:"POST",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
               success:function(data){
                    $("#msg").html(data);
                     $('#confirmresultstransmission').hide();
                    $("#myModalLabel").html("Voter: Voting Validation");
                    $("#myModal").modal('show');

                }
            });  
    }));
$("#addvoterform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
       $('#myModal').modal({"backdrop":"static"});
     $.ajax({
              url:"add_voter.php",
              type:"POST",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
               success:function(data){
                    $("#msg").html(data);
                    $('#confirmresultstransmission').hide();
                    $("#myModalLabel").html("Voter: Registration");
                    $("#myModal").modal('show');

                }
            });  
    }));
     
  $('#clerk_profile').click(function(){
    updateclerkprofile();
     $('#myViewModal').modal({"backdrop":"static"});
         $("#myViewModalLabel").html("Update Clerk Profile Details");  
          $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updateclerkprofile();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });

      });

        function updateclerkprofile(){
       $.ajax({
          url:"load_update_clerk.php",
          method:"POST",
          success:function(data){
            $('#myViewmsg').html(data);
          }
        });
      }
//end of view ceo profile modal
 $.ajax({
        url:"../load_county.php",
        method:"POST",
        success:function(data){
          $('#countycode').html(data);
        }
      });
  var type;
    $(document).ready(function(){
      var loadcounty="loadcounty";
      $.ajax({
        url:"../load_county.php",
        method:"POST",
        data:{loadcounty:loadcounty},
        dataType:"text",
        success:function(data){
          $('#countycode').html(data);
        }
      });
      //load presidentila results
     $.ajax({
        url:"load_president_votes.php",
        method:"POST",
        success:function(data){
          $('#presidentialpollingresults').html(data);
        }
      });
      //load governor results
     $.ajax({
        url:"load_governor_votes.php",
        method:"POST",
        success:function(data){
          $('#governorpollingresults').html(data);
        }
      });
      //load senator results
       $.ajax({
        url:"load_senator_votes.php",
        method:"POST",
        success:function(data){
          $('#senatorpollingresults').html(data);
        }
      });
      //load womenrep results
      $.ajax({
        url:"load_womenrep_votes.php",
        method:"POST",
        success:function(data){
          $('#womenreppollingresults').html(data);
        }
      });
      //load mp results
      $.ajax({
        url:"load_mp_votes.php",
        method:"POST",
        success:function(data){
          $('#mppollingresults').html(data);
        }
      });
      //load mca results
      $.ajax({
        url:"load_mca_votes.php",
        method:"POST",
        success:function(data){
          $('#mcapollingresults').html(data);
        }
      });
     

      });
    function transmitvotes(types){
           
          var type= types;
         $.ajax({
        url:"transmit_results.php",
        method:"POST",
        data:{type:type},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("Result Transmission Message");
          $("#confirmresultstransmission").hide();
        }
      });
 
    }    
 
 
      //display on changing value  of county
      $('#countycode').change(function(){
        var countycode=$('#countycode').val();
        //load constituency
        $.ajax({
          url:"../load_constituency.php",
          method:"POST",
          data:{countycode:countycode},
          dataType:"text",
          success:function(data){
            $('#constituencycode').html(data);
          }
        });
      });
      //display on changing value  of constituency
      $('#constituencycode').change(function(){
        var constituencycode=$('#constituencycode').val();
        //../load constituency
        $.ajax({
          url:"../load_ward.php",
          method:"POST",
          data:{constituencycode:constituencycode},
          dataType:"text",
          success:function(data){
            $('#wardcode').html(data);
          }
        });
    });
    //displaypoll
    $('#wardcode').change(function(){
      var wardcode=$('#wardcode').val();
      //../load polling
      $.ajax({
        url:"../load_polling.php",
        method:"POST",
        data:{wardcode:wardcode},
        dataType:"text",
        success:function(data){
          $('#pollingcode').html(data);
        }
      });
  });
    var loadFile=function(event){
                var reader=new FileReader();
                reader.onload=function(){
                    var output=document.getElementById('output');
                    output.src=reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
</script>



<script src="../plugins/jQuery/jquery-2.2.3.min.js" ></script>

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
 