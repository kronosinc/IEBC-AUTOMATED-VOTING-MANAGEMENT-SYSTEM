<?php
// include 'check_login_ceo.php';
// include 'count_records.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['ceo_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['ceo_username'];
  $current_user = $_SESSION['ceo_fullname'];
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
  <title>AMVS | CEO Dashboard</title>
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

    <style>
    #bod {

      background: #f6f6f6;
      top: 60%;
      left: 50%;
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
    body{
      font-family: sans-serif;
      font-size: 11pt;
      background-image: url(../dist/img/bg.png);
      background-size: cover;
      background-attachment: fixed;
    }
    
    #header {
      background-color: #005cb7;
      color: white;
      padding: inherit;
    }
    .clockStyle{
      font-size: 13px;
      margin: 0 auto;
      color: white;
      font-weight: bold;
      text-align: center;
    }
    .image-cropper{
      position: relative;
      overflow: hidden;
      border-radius: 50%;
      }

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
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

			  $sql = "SELECT * FROM ceo where email='$myusername'";
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
					   echo '<img src="data:image;base64,'.$row["photo"].'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
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

			  $sql = "SELECT * FROM ceo where email='$myusername'";
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
					  echo '<img src="data:image;base64,'.$row["photo"].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {

                  }
                   $conn->close();

			  ?>


                <p>
                  <?php echo"$current_user"; ?>
                  <small><?php echo"$regid"; ?> , CEO</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a id="ceo_profile" class="btn btn-default btn-flat bg-green">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <?php
        include '../db_config/connection.php';

        $sql = "SELECT * FROM ceo where  email='$myusername'";
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
            echo '<img style="height:40px;" src="data:image;base64,'.$row["photo"].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>

        </div>
        <div class="pull-left info">
          <p><?php echo"$current_user"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i><h style="color:cyan;"> Logged In (CEO)</h></a>
        </div>
      </div>

      <ul class="sidebar-menu">
     <li class="treeview alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="" style="text-decoration:none;">
            <i class="fa fa-database"></i>
              <span class="glyphicon glyphicon-refresh" style="color:yellow;"></span><strong style="color:black;"> Page Refresh</strong>
          </a>
        </li>
<!-- create manage candidates panel -->
<div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsmanagecandidates" >
<button class="sidebar-menu btn btn-block btn-default active header glyphicon glyphicon-user" style="color: black;padding: 10px;"><b> Manage Users <span class="caret"></span></b></button>
</a>
</h4>
<div id="collapsmanagecandidates" class=" collapse in">
<div class="">
<ul class="sidebar-menu" style="background-color:;">
      
      <!--   <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
              <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px"><b> Registrar Officer</b></button>
             <span class="caret"></span>  
          </a>
          <ul class="treeview-menu" style="background-color:black;">

            <li><a href="new_reg.php" style="text-decoration:none;"><i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Register New Registrar</button></a></li>
            <li><a href="view_reg.php" style="text-decoration:none;"><i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize Registrars</button></a></li>
          </ul>
        </li> -->
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
              <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px;font-size: 12px;"><b> County Returnings(CRO)</b></button>
             <span class="caret"></span>  
          </a>
         <ul class="treeview-menu" style="background-color:black;">
            <li>
            <!-- <a href="new_agent.php" style="text-decoration:none;"> -->
                <a id="addCROnew" class="addCROnew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> New CRO</button></a></li>
            <li>
            <!-- <a href="view_agent.php" style="text-decoration:none;"> -->
                    <a id="addCROview" class="addCROview" style="text-decoration:none;">       
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize CRO</button></a></li>
          </ul>
        </li>


           <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
              <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px;font-size: 12px;"><b> Returning Officer</b></button>
             <span class="caret"></span>  
          </a>
         <ul class="treeview-menu" style="background-color:black;">
            <li>
            <!-- <a href="new_agent.php" style="text-decoration:none;"> -->
                <a id="addcronew" class="addcronew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> New Returning</button></a></li>
            <li>
            <!-- <a href="view_agent.php" style="text-decoration:none;"> -->
                    <a id="addcroview" class="addcroview" style="text-decoration:none;">       
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize Returning</button></a></li>
          </ul>
        </li>

        
    <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
              <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px;font-size: 12px;"><b> Presiding Officer</b></button>
             <span class="caret"></span>  
          </a>
         <ul class="treeview-menu" style="background-color:black;">
            <li>
            <!-- <a href="new_agent.php" style="text-decoration:none;"> -->
                <a id="addpresidingnew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Register New Presiding</button></a></li>
            <li>
            <!-- <a href="view_agent.php" style="text-decoration:none;"> -->
                    <a id="addpresidingview" class="addpresidingview" style="text-decoration:none;">       
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize Presiding</button></a></li>
          </ul>
        </li>
    
    <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
              <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px;font-size: 12px;"><b> Clerks</b></button>
             <span class="caret"></span>  
          </a>
          <ul class="treeview-menu" style="background-color:black;">
            <li>
            <!-- <a href="new_agent.php" style="text-decoration:none;"> -->
                <a id="addclerknew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px">New Clerk</button></a></li>
            <li>
            <!-- <a href="view_agent.php" style="text-decoration:none;"> -->
                    <a id="addclerkview" class="addclerkview" style="text-decoration:none;">       
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize Clerks</button></a></li>
          </ul>
        </li>
         
      </ul>
</div>
</div>
</div>
<!-- end mange canditaes panel -->
<hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;">
       
    

      </ul>
    </section>
<div id="loadchairsessionvoting" class="well pull-left loadchairsessionvoting" style="width: 30%;min-width: 250px;"> 
  
   </div>
  </aside>


  <div class="content-wrapper" style="background-color:#ffff99;">


    <section class="content-header">
      <h1>
        <p class="glyphicon glyphicon-dashboard" style="font-size:20px;"></p><b style="font-size:18px;"><i> CEO Dashboard</b></i>

      </h1>
      <ol class="breadcrumb pull-right bg-green" style="margin-top:-0.8%;">

        <li><a href=""><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-th-large"> Results</i> </a></li>
        <li><a href=""><i class=" btn btn-primary active"> CEO Dashboard</i> </a></li>
      </ol>
    </section>
    <!--  end of breadcrumbs-->
    <hr class="main-footer bg-gray" style="border-radius:4px 4px 4px 4px;margin-top:1%;margin-left:1%;margin-right:1%;">
    <div class="row" id="usersinfo">
  
      </div>
      <div id="ceoloadall" class="well pull-left ceoloadall" style="width: 99%;min-width: 250px;margin-left: 5px;"> 
  
   </div>

</div>
</section>
</div>

</section>
</div>
<footer class="main-footer bg-aqua" >
<div class="pull-right hidden-xs">
<b>AMVS@2018</b>
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">Online Election System</a>.</strong> All rights
reserved.
</footer>


<div class="control-sidebar-bg"></div>
</div>
<center>
<!-- Modal -->
<div class="modal fade " id="myViewModal" tabindex="-1" role="dialog" aria-labelledby="myViewModalLabel" aria-hidden="false" data-backdrop="false"  style="margin-left:0; ">
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
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false"  style="margin-left:0;">
<div class="modal-dialog modal-lg ">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;" >
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel">
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg" style="">

AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->
<!-- create server replay modal -->
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

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
AMVS Message Alert
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
</center>
<!-- end of bootstra modal -->
<!-- <script type="text/javascript">
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
</script> -->

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
 var currentTime = new Date();
    var curt=currentTime.getHours();
    setInterval(function(){
      $('.loadchairsessionvoting').load('load_chair_session.php?ref='+curt)
    },500);
  function loadusers(){
   $.ajax({
    url:"load_usersinfo.php",
    method:"POST",
    success:function(data){
      $('#usersinfo').html(data);
    }
  });

}

$(document).ready(function(){
      loadusers();
//btnc("dd");
       $("#closeokay").hide();
      // $("#myViewModal").modal('show');
       //  $("#myModal").modal({backdrop:false,show:true});
       // $(".modal-dialog").draggable({handle:".modal-header"});
  });
//create view ceo profile modal
  $('#ceo_profile').click(function(){
    updateceoprofile();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update CEO Profile Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updateceoprofile();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
         });
//end of view ceo profile modal
//create add CRO modal
  $('#addCROnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newCROform" id="newCROform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone"  placeholder="+254 XXX XXX XXX" minlength="13" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@CRO.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group">   <select class="form-control" name="county" id="countycode" required>   <option >Choose County</option>  </select> </div>  <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addCRO" id="saveCRO"> Add County Returning Officer   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add County Returning Officer Details");
                  $("#myModal").modal('show');
                  loadparty();
    $("#newCROform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"new_countyret2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS County Returning Officer Success");
        $("#serverreplay").modal('show');
      }
    });  
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
   $('#pressokay').click(function(){
           window.location="index.php";
   });
  });
//end of add CRO modal
//create view CRO modal
  $('.addCROview').click(function(){
     $.ajax({
          url:"load_update_CRO.php",
          method:"POST",
          success:function(data){
            $('#ceoloadall').html(data);
          }
        });
         //   $('#okay').click(function(){
         //  updateCRO();
         // });
           $('#okay').click(function(){
           window.location="index.php";
         });
  });
//end of view CRO modal

//create add cro modal
  $('#addcronew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newcroform" id="newcroform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone"  placeholder="+254 XXX XXX XXX" minlength="13" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@cro.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group">   <select class="form-control" name="county" id="countycode" required>   <option >Choose County</option>  </select> </div>  <div class="form-group">  <select class="form-control" name="constituency" id="constituencycode" required>  <option>Choose Constituency</option>  <option>Choose County First</option>  </select>  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addcro" id="savecro"> Add Constituency Returning Officer   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Constituency Returning Officer Details");
                  $("#myModal").modal('show');
                  loadparty();
    $("#newcroform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"new_constituencyret2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Constituency Returning Officer Success");
        $("#serverreplay").modal('show');
      }
    });  
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
   $('#pressokay').click(function(){
           window.location="index.php";
   });
  });
//end of add cro modal
//create view cro modal
  $('.addcroview').click(function(){
    updatecro();
     $('#myViewModal').modal({"backdrop":"static"});
         $("#myViewModalLabel").html("Update Constituency Returning Officer Details");  
          $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatecro();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view cro modal



//create add agent modal
  $('#addclerknew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newagentform" id="newagentform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone"  placeholder="+254 XXX XXX XXX" minlength="13" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@agent.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group">   <select class="form-control" name="county" id="countycode" required>   <option >Choose County</option>  </select> </div>  <div class="form-group">  <select class="form-control" name="constituency" id="constituencycode" required>  <option>Choose Constituency</option>  <option>Choose County First</option>  </select>  </div> <div class="form-group">  <select class="form-control" name="ward" id="wardcode" required>  <option>Choose Ward</option> <option>Choose Constituency First</option> </select> </div>   <div class="form-group">   <select class="form-control"  name="polling" id="pollingcode"><option>Choose polling Station</option><option>Choose Ward First</option>     </select>  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addcagent" id="savecagent"> Add Clerk   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Clerk Details");
                  $("#myModal").modal('show');
                  loadparty();
    $("#newagentform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"new_clerk.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Clerk Success");
        $("#serverreplay").modal('show');
      }
    });  
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
   $('#pressokay').click(function(){
           window.location="index.php";
   });
  });
//end of add agent modal
//create view presiding modal
  $('.addclerkview').click(function(){
    updateclerk();
      $('#myModal').fullscreen();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update Clerk Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updateclerk();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view agent modal
//create add presiding modal
  $('#addpresidingnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newpresidingform" id="newpresidingform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone"  placeholder="+254 XXX XXX XXX" minlength="13" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@presiding.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group">   <select class="form-control" name="county" id="countycode" required>   <option >Choose County</option>  </select> </div>  <div class="form-group">  <select class="form-control" name="constituency" id="constituencycode" required>  <option>Choose Constituency</option>  <option>Choose County First</option>  </select>  </div> <div class="form-group">  <select class="form-control" name="ward" id="wardcode" required>  <option>Choose Ward</option> <option>Choose Constituency First</option> </select> </div> <div class="form-group">   <select class="form-control"  name="polling" id="pollingcode"><option>Choose polling Station</option><option>Choose Ward First</option>     </select>  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addpresiding" id="savepresiding"> Add Presiding   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Presiding Details");
                  $("#myModal").modal('show');
                  loadparty();
    $("#newpresidingform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"new_presd2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Presiding Success");
        $("#serverreplay").modal('show');
      }
    });  
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
   $('#pressokay').click(function(){
           window.location="index.php";
   });
  });
//end of add presiding modal
//create view presiding modal
  $('.addpresidingview').click(function(){
    updatepresiding();
     $('#myViewModal').modal({"backdrop":"static"});
         $("#myViewModalLabel").html("Update Presiding Details");  
          $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatepresiding();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view presiding modal
      function loadparty(){
        //load party
          $.ajax({
    url:"../load_party.php",
    method:"POST",
    success:function(data){
      $('#partycode').html(data);
    }
  });  
          //../load counties
           $.ajax({
    url:"../load_county.php",
    method:"POST",
    success:function(data){
      $('#countycode').html(data);
    }
  });
           //laod constituencies
           $('#countycode').change(function(){
      var countycode=$('#countycode').val();
      //../load constituency
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
           //../load ward
            $('#constituencycode').change(function(){
      var constituencycode=$('#constituencycode').val();
      //../load ward
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
             //../load polling
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
      }
       function updatepresiding(){
       $.ajax({
          url:"load_update_presiding.php",
          method:"POST",
          success:function(data){
            $('#myViewmsg').html(data);
          }
        });
      }
      //  function updatepresidings(hideid){
      //   var hideid=hideid;
      //  $.ajax({
      //     url:"load_update_presiding_noedit.php",
      //     method:"POST",
      //     data:{hideid:hideid},
      //     dataType:"text",
      //     success:function(data){
      //       $('#myViewmsg').html(data);
      //     }
      //   });
      // }
       function updateCRO(){
       $.ajax({
          url:"load_update_CRO.php",
          method:"POST",
          success:function(data){
            $('#myViewmsg').html(data);
          }
        });
      }
       function updatecro(){
       $.ajax({
          url:"load_update_returnings.php",
          method:"POST",
          success:function(data){
            $('#myViewmsg').html(data);
          }
        });
      }
      function updateclerk(){
       $.ajax({
          url:"load_clerk.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
$(document).on('click','.editbtn',function(){
     $('#serverreplay').modal({"backdrop":"static"});
    var ref=$(this).data("id1");
    var uname=$(this).data("id2");
     $.ajax({
      url:"update_countyreturning_det.php",
      type:"POST",
    data:{ref:ref},
    dataType:"text",
      success:function(data){
        $("#closeokay").show();
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS County Returning Edit "+uname);
        $("#serverreplay").modal('show');
      }
    });

  });      
  //   $(document).on('click','.editbtn',function(){
  //   var ref=$(this).data("id1");
  //   var uname=$(this).data("id2");
  //   $("#closeokay").show();
  //   $('#replaymsg').html("Do you want to Update "+uname);
  //       $("#servermodallabel").html("AMVS Presiding Update");
  //       $("#serverreplay").modal('show');
  //        $('#okay').click(function(){
  // // $('#serverreplay').modal({"backdrop":"static"});
  //      update_presd(ref);
  //                 // return true;
  //  });
     
  // });
  //       function update_presd(ref){
  //     $.ajax({
  //     url:"update_presd.php",
  //     type:"POST",
  //   data:{ref:ref},
  //   dataType:"text",
  //     success:function(data){
  //       $("#closeokay").show();
  //       $('#msg').html(data);
  //       $("#myModalLabel").html("AMVS Presiding Edit");
  //       $("#myModal").modal('show');
  //     }
  //   });
  //   }
</script>
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
       function updateceoprofile(){
       $.ajax({
          url:"load_update_ceo.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
    </script>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="../Responsive-Fullscreen-Modal-Plugin-For-Bootstrap-3-4/dist/bs-modal-fullscreen.js" ></script>
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
