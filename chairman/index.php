<?php
// include 'check_login_user.php';
//include 'count_records.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['chairman_username'])  && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['chairman_username'];
  $current_user = $_SESSION['chairman_fullname'];
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
  <title>AMVS | Chairman Dashboard</title>
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
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_page.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_table.css">
    <script type="text/javascript" language="javascript" src="../plugins/datatables/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../plugins/datatables/js/jquery.dataTables.js"></script>
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

			  $sql = "SELECT * FROM chairman where email='$myusername'";
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

			  $sql = "SELECT * FROM chairman where email='$myusername'";
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
                  <small><?php echo"$regid"; ?> , CHAIRMAN</small>
                </p>
              </li>

              <li class="user-footer" style="background-color: gray;">
                <div class="pull-left">
                  <a id="chairman_profile" class="btn btn-primary btn-flat bg">Profile</a>
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

        $sql = "SELECT * FROM chairman where  email='$myusername'";
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
        <div class="pull-left info" style="margin-top:4%; ">
          <p><?php echo"$current_user"; ?></p>
          
        </div>
      </div>


      <ul class="sidebar-menu" style="">
      <li class="header glyphicon glyphicon-menu-hamburger" style="color:white;width: 100%;background-color: #1f3f24;"><b> NAVIGATION PANEL</b></li>
  <!--   <li class="header glyphicon glyphicon-menu-hamburger" style="color:black;margin-left:1%;margin-right:1%;background-color:#e68a00;width:99%;"><b> NAVIGATION PANEL</b></li> -->
         <div class="panel-group" id="accordion">
<!-- create manage candidates panel -->
<div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsmanagecandidates" >
<button class="sidebar-menu btn btn-block btn- active header glyphicon glyphicon-user" style="color: black;padding: 7px;background-color: #1f3f24;"><b style="color: white;"> Manage Candidates <span class="caret"></span></b></button>
</a>

</h4>
<div id="collapsmanagecandidates" class=" collapse">
<div class="">
<ul class="sidebar-menu" style="color: black;">
      
      <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
        <a href="management.php" style="text-decoration:none;">
          <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
         <button type="button" class="btn btn-default"><b> Manage Contestants</b></button>
        </a>
      </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a  style="text-decoration:none;" id="addpresidentnew">
          <!-- <a href="add_president.php"style="text-decoration:none;"> -->
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b> Add President</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_governor.php" style="text-decoration:none;"> -->
           <a id="addgovernornew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b> Add Governor</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_senator.php"style="text-decoration:none;"> -->
          <a id="addsenatornew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b> Add Senator</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_womenrep.php"style="text-decoration:none;"> -->
          <a id="addwomenrepnew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b> Add WomenRep</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_mp.php" style="text-decoration:none;"> -->
          <a id="addmpnew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b>Add MP</b></button>
          </a>
        </li>
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_mca.php" style="text-decoration:none;"> -->
          <a id="addmcanew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b>Add MCA</b></button>
          </a>
        </li>
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="addpartynew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default"><b>Add Party</b></button>
          </a>
        </li>
      </ul>
      </div>
      </div>

</div>

<!-- end mange canditaes panel -->
<!-- create voters and voting -->
 <div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsvotersvoting" >
<button class="sidebar-menu btn btn-block btn- active header glyphicon glyphicon-inbox" style="color: black;padding: 7px;background-color: #1f3f24;"><b style="color: white;"> Voters and Voting <span class="caret"></span></b></button>
</a>
</h4>
      <div id="collapsvotersvoting" class=" collapse ">
<div class="">
      <ul class="sidebar-menu" style="background-color:;">
      
      <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
        <a id="viewvotersall" style="text-decoration:none;">
          <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
         <button type="button" class="btn btn-default" style="font-size:12px;"><b>Voters</b></button>
        </a>
      </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a  style="text-decoration:none;" id="viewcountyreturmingall">
          <!-- <a href="add_president.php"style="text-decoration:none;"> -->
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> County Returnings</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_governor.php" style="text-decoration:none;"> -->
           <a   style="text-decoration:none;" id="viewconstituencyreturmingall">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> Constituency Returnings</b></button>
          </a>
        </li>
    
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a   style="text-decoration:none;" id="viewpresidingall">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Presidings</b></button>
          </a>
        </li>
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="updatevoterslist"   style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Update Voters Register</b></button>
          </a>
        </li>
      </ul>
</div>
</div>
</div>
<!-- create Voting and Registration Times/Deadline-->
 <div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsvotingregistration" >
<button class="sidebar-menu btn btn-block btn-primary active header glyphicon glyphicon-expand" style="color: black;padding: 7px;background-color: #1f3f24;"><b style="color: white;"> Voting and Registration <span class="caret"></span></b></button>
</a>
</h4>
      <div id="collapsvotingregistration" class=" collapse in">
<div class="">
      <ul class="sidebar-menu" style="background-color:;">
      
      <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
        <a id="votingdate" style="text-decoration:none;">
          <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
         <button type="button" class="btn btn-default" style="font-size:12px;"><b>Voting Date</b></button>
        </a>
      </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a  style="text-decoration:none;" id="registrationdate">
          <!-- <a href="add_president.php"style="text-decoration:none;"> -->
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> Registration Date</b></button>
          </a>
        </li>
        
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="updateballotpapers"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Update Ballot Papers</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="presidentialresults"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Presidentail Results</b></button>
          </a>
        </li>
      </ul>
</div>
</div>
</div>
</div>

       
     <div id="loadchairsessionvoting" class="well pull-left" style="width: 30%;min-width: 230px;margin-top: -6%;"> 
  
   </div>

      </ul>
    </section>
 
  </aside>


  <div class="content-wrapper well" style="background-color:;">
    <section class="content-header well" style="padding: 1px;margin-top: -1.7%;">
      <h1 >
        <p class="glyphicon glyphicon-dashboard " style="font-size:20px;"></p><b style="font-size:18px;"><i> Chairman Dashboard</b></i>

      </h1>
      <ol class="breadcrumb" style="margin-top: -2.4%;">
        <li><a href=""><i class="fa fa-dashboard btn btn- glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class="btn btn- glyphicon glyphicon-dashboard"> Dashboard</i> </a></li>
      </ol>
 </section>

    <!--  end of breadcrumbs-->
  
  <section class=" content well pull-left" style="margin-top: -1.7%;width: 100%;min-width: 300px;" id="allpresidentialres">
   <div id="loadchairsessions" class="well pull-left" style="width: 35%;min-width: 200px;"> 
  
   </div>
   
   <div id="loadpresidentialres" class="well pull-right" style="width: 63%;min-width: 250px;"> 
     
   </div>
   <!-- <div id="allpresidentialres" class="well pull-left" style="width: 100%;min-width: 300px;margin-top: -1.3%;"> 
     
   </div> -->
 </section>

</div>
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
<h1 align="center" class="border"><br><br><br><br>
<div style="margin:0 auto; text-align:center;">
      Loading...
      <??>
      <br>
      <img src="../dist/img/loading.gif" style="background-color:#eee;">
      <br></div></h1>
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
<h1 align="center" class="border"><br><br><br><br>
<div style="margin:0 auto; text-align:center;">
      Loading...
      <??>
      <br>
      <img src="../dist/img/loading.gif" style="background-color:#eee;">
      <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="okay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->
<footer class="main-footer " style="margin-top: -1.7%;background-color: #41f467;">
<div class="pull-right hidden-xs">
<b>AMVS@2018</b>
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">Online Election System</a>.</strong> All rights
reserved.
</footer>


<div class="control-sidebar-bg"></div>
</div>

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
   var currentTime = new Date();
    var curt=currentTime.getHours();
    setInterval(function(){
      $('#loadchairsessionvoting').load('load_chair_session.php?ref='+curt)
    },500);

  $(document).ready(function(){
   
     //$("#myModal").modal('show');
      $.ajax({
      url:"load_presidential_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    });   
  });


   $.ajax({
      url:"load_all_sessions.php",
      method:"POST",
      success:function(data){
        $('#loadchairsessions').html(data);
      }
    }); 

  //view all votes

  $('#viewvotersall').click(function(){
    $.ajax({
      url:"load_voters_all_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    }); 

  });
   $('#presidentialresults').click(function(){
    $.ajax({
      url:"load_county_results.php",
      method:"POST",
      success:function(data){
        $('#allpresidentialres').html(data);
      }
    }); 

  });
  //view all county returningd
  $('#viewcountyreturmingall').click(function(){
    $.ajax({
      url:"load_countyret_all_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    }); 

  });
  $('#viewconstituencyreturmingall').click(function(){
    $.ajax({
      url:"load_constituencyret_all_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    }); 

  });
  $('#viewpresidingall').click(function(){
    $.ajax({
      url:"load_presiding_all_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    }); 

  });
   //update all candidate lists
    $('#updateballotpapers').click(function(){
           $("#msg").html("Candidate list on Ballot page Will be Updated");
          $("#myModalLabel").html("Update Ballot Papers");
            $("#transmitcodediv").hide();
            $("#myModal").modal('show');
              $.ajax({
        url:"update_candidate_list.php",
        method:"POST",
        success:function(data){
          $('#loadpresidentialres').html(data);
          // $("#myModalLabel").html("Updating Ballot Papers Candidate List");
          // $("#confirmresultstransmission").hide();
        }

      });
         
  });
    //update all voters lists register
    $('#updatevoterslist').click(function(){
           $("#msg").html("Voters list on Voters Register Will be Updated");
          $("#myModalLabel").html("Update Voters Register");
            $("#transmitcodediv").hide();
            $("#myModal").modal('show');
              $.ajax({
        url:"update_voters_list.php",
        method:"POST",
        success:function(data){
          $('#loadpresidentialres').html(data);
          // $("#myModalLabel").html("Updating Ballot Papers Candidate List");
          // $("#confirmresultstransmission").hide();
        }

      });
         
  });
   //Set and Modify voting date
  $('#votingdate').click(function(){
   
        $('#loadpresidentialres').html('<h2>Setting Election Date</h2><div class="panel"><form role="form" class="form-horizontal"><div class="form-group has-feedback"> <label class="col-sm-4 control-label">Start Date:</label><div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="startdatevoting"  placeholder="dd/mm/yy" id="startdatevoting"  required></div> </div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">Start Time :</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="starttimevoting" placeholder="county Name" id="starttimevoting" required></div> </div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">End Date :</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="enddatevoting"  placeholder="dd/mm/yy" id="enddatevoting"  required> </div></div><div class="form-group has-feedback"><label class="col-sm-4 control-label">End Time :</label><div class="col-sm-8"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="endtimevoting"  id="endtimevoting" required></div></div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">Activity:</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="activityvoting"  placeholder="Enter Activity Name" id="activityvoting"  required> </div></div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addvotingdate" id="addvotingdate"> Set  Election Date and Time  <i class="fa fa-arrow-circle-up"></i></button>  </form></div><br>');
   
          $('#addvotingdate').click(function(){
            //$("#serverreplay").modal('show');
            var startdatevoting=$('#startdatevoting').val();
              var enddatevoting=$('#enddatevoting').val();
               var starttimevoting=$('#starttimevoting').val();
               var endtimevoting=$('#endtimevoting').val();
                var activityvoting=$('#activityvoting').val();
              var addvotingdate="addvotingdate";
              $.ajax({
      url:"add_voting_session.php",
      type:"POST",
      data:{startdatevoting:startdatevoting,enddatevoting:enddatevoting,starttimevoting:starttimevoting,endtimevoting:endtimevoting,addvotingdate:addvotingdate,activityvoting:activityvoting},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Set Voting Session Success");
        $("#serverreplay").modal('show');
      }
    }); 
          });
  });
  //Set and Modify registration date
  $('#registrationdate').click(function(){
    
        $('#loadpresidentialres').html('<h2>Setting Registration  Date</h2><div class="panel"><form role="form" class="form-horizontal"><div class="form-group has-feedback"> <label class="col-sm-3 control-label">Start Date :</label><div class="col-sm-9"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="startdatereg"  placeholder="dd/mm/yy" id="startdatereg" maxlength="4" minlength="4" required></div> </div><div class="form-group has-feedback"><label class="col-sm-3 control-label">Start Time :</label> <div class="col-sm-9"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="starttimereg" placeholder="county Name" id="starttimereg" required></div> </div><div class="form-group has-feedback"><label class="col-sm-3 control-label">End Date :</label> <div class="col-sm-9"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="enddatereg"  placeholder="dd/mm/yy" id="enddatereg" maxlength="4" minlength="4" required> </div></div> <div class="form-group has-feedback"><label class="col-sm-3 control-label">End Time :</label><div class="col-sm-9"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="endtimereg" placeholder="county Name" id="endtimereg" required></div></div><div class="form-group has-feedback"><label class="col-sm-4 control-label">Activity:</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="activityreg"  placeholder="Enter Activity Name" id="activityreg"  required> </div></div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addregdate" id="addregdate"> Set Registration Date and Time  <i class="fa fa-arrow-circle-up"></i></button>  </form></div><br>');

             $('#addregdate').click(function(){
            //$("#serverreplay").modal('show');
            var startdatereg=$('#startdatereg').val();
              var enddatereg=$('#enddatereg').val();
               var starttimereg=$('#starttimereg').val();
              var endtimereg=$('#endtimereg').val();
                var activity=$('#activityreg').val();
              var addregdate="addregdate";
              $.ajax({
      url:"add_reg_session.php",
      type:"POST",
      data:{startdatereg:startdatereg,enddatereg:enddatereg,starttimereg:starttimereg,endtimereg:endtimereg,addregdate:addregdate,activity:activity},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Set Registration Session Success");
        $("#serverreplay").modal('show');
      }
    }); 
          });
  });
  //create view chairman profile modal
  $('#chairman_profile').click(function(){
    updatechairmanprofile();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update Chairman Profile Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updatechairmanprofile();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
         });
//end of view chairman profile modal
//create add president modal
   $('#addpresidentnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
     // $('#loadpresidentialres').html('<form action="" method="POST" enctype="multipart/form-data" name="presidentform" id="presidentform" onsubmit="validatepresident()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div>   <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addpresident" id="savepresident"> Add President   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
    
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="presidentform" id="presidentform" onsubmit="validatepresident()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div>   <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addpresident" id="savepresident"> Add President   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add President Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#presidentform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
              var addpresident="addpresident";
              var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_president2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS President Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
//end of add president modal

// start Governor modal
  $('#addgovernornew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="governorform" id="governorform" onsubmit="validategovernor()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div> <div class="form-group">    <select class="form-control" name="countycode" id="countycode" > </select></div>  <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addgovernor" id="savegovernor"> Add Governor   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Governor Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#governorform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
               var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_governor2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Governor Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
// end governor modal
// start Senator modal
  $('#addsenatornew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="senatorform" id="senatorform" onsubmit="validatesenator()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div> <div class="form-group">    <select class="form-control" name="countycode" id="countycode" > </select></div>  <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addsenator" id="savesenator"> Add Senator   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Senator Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#senatorform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
               var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_senator2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Senator Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
// end senator modal
// start Womenrep modal
  $('#addwomenrepnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="womenrepform" id="womenrepform" onsubmit="validatewomenrep()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div> <div class="form-group">    <select class="form-control" name="countycode" id="countycode" > </select></div>  <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addwomenrep" id="savewomenrep"> Add WomenRep   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add WomenRep Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#womenrepform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
               var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_womenrep2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS WomenRep Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
// end womenrep modal
// start MP modal
  $('#addmpnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="mpform" id="mpform" onsubmit="validatemp()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div> <div class="form-group">    <select class="form-control" name="countycode" id="countycode" > </select></div>   <div class="form-group"> <select class="form-control" name="constituencycode" id="constituencycode" required> <option>Choose Constituency(Select County First)</option>   </select>  </div>  <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addmp" id="savemp"> Add MP   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add MP Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#mpform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
               var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_mp2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS MP Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
// end mp modal
// start MCA modal
  $('#addmcanew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="mcaform" id="mcaform" onsubmit="validatemca()">  <div class="form-group has-feedback"> <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="uname" id="uname"  placeholder="Name of Candidate" required>  </div><div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="nid" id="nid" placeholder="National ID" maxlength="8" minlength="8" required>  </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Choose Party</option>   </select>   </div> <div class="form-group">    <select class="form-control" name="countycode" id="countycode" > </select></div>  <div class="form-group"> <select class="form-control" name="constituencycode" id="constituencycode" required> <option>Choose Constituency(Select County First)</option>   </select>  </div>  <div class="form-group">  <select class="form-control" name="wardcode" id="wardcode" > <option>Choose Ward(Select Constituency First)</option>  </select> </div> <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addmca" id="savemca"> Add MCA   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add MCA Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#mcaform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var uname=$('#uname').val();
              var nid=$('#nid').val();
              var partycode=$('#partycode').val();
               var gender;
              var gendermale=document.getElementById("gendermale");
                       var genderfemale=document.getElementById("genderfemale");
                      if(gendermale.checked){
                          gender=gendermale.value;
                      }
                      else if(genderfemale.checked){
                         gender=genderfemale.value;
                      }
                      else{
                          gender="";
                      }
           
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid Full Name");
                  $("#servermodallabel").html("Full Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(nid==""){
                  $('#replaymsg').html("Please enter Valid National ID Number");
                  $("#servermodallabel").html("National ID Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(gender==""){
                  $('#replaymsg').html("Please Choose Valid Gender");
                  $("#servermodallabel").html("Gender Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_mca2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS MCA Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
// end mca modal
// start Party modal
  $('#addpartynew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="partyform" id="partyform" onsubmit="validateparty()"> <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="partycode"  placeholder="Party Code(XXXX)" id="partycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="partyname" placeholder="Party Name" id="partyname" required></div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addparty" id="saveparty"> Add Party   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Party Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#partyform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var partyname=$('#partyname').val();
             
              var partycode=$('#partycode').val();
              if(partyname==""){
                  $('#replaymsg').html("Please enter Valid Party Name");
                  $("#servermodallabel").html("Party Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(partycode==""){
                  $('#replaymsg').html("Please Choose Valid Party Code");
                  $("#servermodallabel").html("Party Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_party2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS PARTY Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

  });
// end party modal
// start county modal
  $('#addcountynew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="countyform" id="countyform" onsubmit="validatecounty()"> <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="countycode"  placeholder="county Code(XXXX)" id="countycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="countyname" placeholder="county Name" id="countyname" required></div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addcounty" id="savecounty"> Add county   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add county Details");
                  $("#myModal").modal('show');
    loadcounty();
    $("#countyform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var countyname=$('#countyname').val();
             
              var countycode=$('#countycode').val();
              if(countyname==""){
                  $('#replaymsg').html("Please enter Valid county Name");
                  $("#servermodallabel").html("county Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(countycode==""){
                  $('#replaymsg').html("Please Choose Valid county Code");
                  $("#servermodallabel").html("county Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_county2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS county Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

  });
// end county modal
// start constituency modal
  $('#addconstituencynew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="partyform" id="partyform" onsubmit="validateparty()"> <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="partycode"  placeholder="Party Code(XXXX)" id="partycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="partyname" placeholder="Party Name" id="partyname" required></div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addconstituency" id="saveconstituency"> Add Constituency   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Constituency Details");
                  $("#myModal").modal('show');
    loadconstituency();
    $("#constituencyform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var constituencyname=$('#constituencyname').val();
             
              var constituencycode=$('#constituencycode').val();
              if(constituencyname==""){
                  $('#replaymsg').html("Please enter Valid Constituency Name");
                  $("#servermodallabel").html("Constituency Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(constituencycode==""){
                  $('#replaymsg').html("Please Choose Valid constituency Code");
                  $("#servermodallabel").html("Constituency Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_constituency2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS CONSTITUENCY Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

  });
// end constituency modal
// start ward modal
  $('#addwardnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="partyform" id="partyform" onsubmit="validateparty()"> <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="partycode"  placeholder="Party Code(XXXX)" id="partycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="partyname" placeholder="Party Name" id="partyname" required></div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addward" id="saveward"> Add Ward   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Ward Details");
                  $("#myModal").modal('show');
    loadward();
    $("#wardform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var wardname=$('#wardname').val();
             
              var wardcode=$('#wardcode').val();
              if(wardname==""){
                  $('#replaymsg').html("Please enter Valid Ward Name");
                  $("#servermodallabel").html("Ward Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(wardcode==""){
                  $('#replaymsg').html("Please Choose Valid Ward Code");
                  $("#servermodallabel").html("Ward Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_ward2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS WARD Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

  });
// end ward modal
// start polling modal
  $('#addpollingnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="partyform" id="partyform" onsubmit="validateparty()"> <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="partycode"  placeholder="Party Code(XXXX)" id="partycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="partyname" placeholder="Party Name" id="partyname" required></div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addpolling" id="savepolling"> Add polling   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add Polling Details");
                  $("#myModal").modal('show');
    loadpolling();
    $("#pollingform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     var pollingname=$('#pollingname').val();
             
              var pollingcode=$('#pollingcode').val();
              if(pollingname==""){
                  $('#replaymsg').html("Please enter Valid Polling Name");
                  $("#servermodallabel").html("Polling Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
          
               else if(pollingcode==""){
                  $('#replaymsg').html("Please Choose Valid Polling Code");
                  $("#servermodallabel").html("Polling Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
$.ajax({
      url:"add_polling2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS POLLING Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

  });
// end polling modal
  var loadFile=function(event){
                var reader=new FileReader();
                reader.onload=function(){
                    var output=document.getElementById('output');
                    output.src=reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
function loadparty(){
        //load party
          $.ajax({
    url:"../load_party.php",
    method:"POST",
    success:function(data){
      $('#partycode').html(data);
    }
  });  
          //load counties
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
      }
      function updatechairmanprofile(){
       $.ajax({
          url:"load_update_chairman.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
      $("#okay").click(function(){
    window.location="index.php";
     });
       </script>
     <!--   <script type="text/javascript">
         $(document).ready(function(){
   
     $("#myModal").modal('show');
      $.ajax({
      url:"load_presidential_chair.php",
      method:"POST",
      success:function(data){
        $('#loadpresidentialres').html(data);
      }
    });   
  });
       </script> -->
       
     
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


<!-- <h2>Setting Election Date</h2><div class="panel"><form role="form" class="form-horizontal"><div class="form-group has-feedback"> <label class="col-sm-4 control-label">Start Date:</label><div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="startdatevoting"  placeholder="dd/mm/yy" id="startdatevoting"  required></div> </div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">Start Time :</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="starttimevoting" placeholder="county Name" id="starttimevoting" required></div> </div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">End Date :</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="enddatevoting"  placeholder="dd/mm/yy" id="enddatevoting"  required> </div></div><div class="form-group has-feedback"><label class="col-sm-4 control-label">End Time :</label><div class="col-sm-8"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="endtimevoting"  id="endtimevoting" required></div></div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">Activity:</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="activityvoting"  placeholder="Enter Activity Name" id="activityvoting"  required> </div></div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addvotingdate" id="addvotingdate"> Set  Election Date and Time  <i class="fa fa-arrow-circle-up"></i></button>  </form></div><br>


'<h2>Setting Registration  Date</h2><div class="panel"><form role="form" class="form-horizontal"><div class="form-group has-feedback"> <label class="col-sm-3 control-label">Start Date :</label><div class="col-sm-9"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="startdatereg"  placeholder="dd/mm/yy" id="startdatereg" maxlength="4" minlength="4" required></div> </div><div class="form-group has-feedback"><label class="col-sm-3 control-label">Start Time :</label> <div class="col-sm-9"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="starttimereg" placeholder="county Name" id="starttimereg" required></div> </div><div class="form-group has-feedback"><label class="col-sm-3 control-label">End Date :</label> <div class="col-sm-9"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="date" class="form-control" name="enddatereg"  placeholder="dd/mm/yy" id="enddatereg" maxlength="4" minlength="4" required> </div></div> <div class="form-group has-feedback"><label class="col-sm-3 control-label">End Time :</label><div class="col-sm-9"> <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="time" class="form-control" name="endtimereg" placeholder="county Name" id="endtimereg" required></div></div><div class="form-group has-feedback"><label class="col-sm-4 control-label">Activity:</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="activityvoting"  placeholder="Enter Activity Name" id="activityvoting"  required> </div></div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addregdate" id="addregdate"> Set Registration Date and Time  <i class="fa fa-arrow-circle-up"></i></button>  </form></div><br> -->