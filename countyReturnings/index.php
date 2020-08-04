<?php
// include 'check_login_countyret.php';
// include 'count_records.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['countyreturnings_username'];
  $current_countyreturnings = $_SESSION['fullname_countyreturnings'];
   $countyret_id=$_SESSION['countyret_id'] ;
  $current_county=$_SESSION['countyreturnings_current_county'] ;
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
  <title>AMVS | CountyRet Dashboard</title>
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

        $sql = "SELECT * FROM countyreturnings where email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
         $gender = $row['gender'];
         $regid = $row['nid'];
         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="user-image" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="user-image" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }

         }else{
             echo '<img src="../uploads/'.$row['photo'].'" class="user-image" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>

              <span class="hidden-xs"><?php echo"$current_countyreturnings"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
        <?php
        include '../db_config/connection.php';

        $sql = "SELECT * FROM countyreturnings where email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
         $gender = $row['gender'];
         $regid = $row['nid'];
         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }

         }else{
            echo '<img src="../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>


                <p>
                  <?php echo"$current_countyreturnings"; ?>
                  <small><?php echo"$regid"; ?> , COUNTYRET</small>
                </p>
              </li>

              <li class="user-footer" style="background-color: gray;">
                <div class="pull-left">
                  <a id="countyret_profile" class="btn btn-primary btn-flat bg-">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat bg-">Sign out</a>
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

        $sql = "SELECT * FROM countyreturnings where  email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['photo'];
         $gender = $row['gender'];
         $regid = $row['nid'];
         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'">';
           }

         }else {
            echo '<img style="height:40px;" src="../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_countyreturnings.'" title="'.$current_countyreturnings.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>

        </div>
        <div class="pull-left info" style="margin-top:4%;">
          <p><?php echo"$current_countyreturnings"; ?></p>
        </div>
      </div>

      <ul class="sidebar-menu" style="">
      <li class="header glyphicon glyphicon-menu-hamburger" style="color:white;width: 100%;background-color:#1f3f24;"><b> NAVIGATION PANEL</b></li>

        <div class="panel-group" id="accordion">

<!-- create voters and voting -->
 <div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsvotersvoting" >
<button class="sidebar-menu btn btn-block btn active header glyphicon glyphicon-user" style="color: black;padding: 7px;background-color:#1f3f24;"><b style="color: white;"> Ballot Box <span class="caret"></span></b></button>
</a>
</h4>
      <div id="collapsvotersvoting" class=" collapse in">
<div class="">
      <ul class="sidebar-menu" style="background-color:;">
      
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
           <a   style="text-decoration:none;" id="loadconstituencyresults">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> Constituency Result</b></button>
          </a>
        </li>
      <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a  style="text-decoration:none;" id="loadcountyresults">
          <!-- <a href="add_president.php"style="text-decoration:none;"> -->
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> County Results</b></button>
          </a>
        </li>
      
      
    
      </ul>
</div>
</div>
</div>

</div>
<div id="loadchairsessionvoting" class="well pull-left" style="width: 28%;min-width: 230px;margin-top: -6%;"> 
  
             </div>
   
      </ul>
    </section>

  </aside>


  <div class="content-wrapper well" style="background-color:white;">

     <section class="content-header well" style="padding: 1px;margin-top: -1.7%;">
      <h1>
        <p class="glyphicon glyphicon-dashboard " style="font-size:20px;"></p><b style="font-size:18px;"><i> County-Ret Dashboard</b></i>

      </h1>
      <ol class="breadcrumb" style="margin-top: -2.4%;">
        <li><a href=""><i class="fa fa-dashboard btn btn glyphicon glyphicon-th-large"> <?php echo 'County: '.$_SESSION['county_name']; ?></i> </a></li>
        <li><a href=""><i class=" btn btn active glyphicon glyphicon-random"> CountyRet Dashboard</i> </a></li>
      </ol>
    </section>
    <!--  end of breadcrumbs-->
<div id="loadpresidingres" class="well pull-left" style="width: 100%;min-width: 260px;padding: 2px;margin-top: -1.8%;"> 
                
             </div>

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

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" id="myclose">Close
</button>
<!-- <button type="button" class="confirmresultstransmission btn btn-primary" id="confirmresultstransmission">Transmit Result
</button> -->

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
  var currentTime = new Date();
    var curt=currentTime.getHours();
    setInterval(function(){
      $('#loadchairsessionvoting').load('load_chair_session.php?ref='+curt)
    },500);
      //load constituency results
         $('#loadconstituencyresults').click(function(){
       $.ajax({
      url:"load_constituency_results.php",
      method:"POST",
      success:function(data){
        $('#loadpresidingres').html(data);
      }
    }); 
     });
          //load county results
         $('#loadcountyresults').click(function(){
       $.ajax({
      url:"load_county_results.php",
      method:"POST",
      success:function(data){
        $('#loadpresidingres').html(data);
      }
    }); 
     });
         //create view countyret profile modal
  $('#countyret_profile').click(function(){
    updatecountyretprofile();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update CountyRet Profile Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updatecountyretprofile();
         });
           $('#myclose').click(function(){
           window.location="index.php";
         });
         });
  
   function updatecountyretprofile(){
       $.ajax({
          url:"load_update_CRO.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
//end of view countyret profile modal
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
