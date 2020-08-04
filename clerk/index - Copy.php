<?php
//include 'check_login_agent.php';
session_start(7);
if (isset($_SESSION['loggedin']) && isset($_SESSION['clerk_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=  $_SESSION['clerk_pollingstation'] ;
  $pollingname=  $_SESSION['clerk_pollingname'] ;
    $clerkid=$_SESSION['clerkid'];

 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
// include 'count_records.php';
//$votingsession=8;
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
					   echo '<img src=""../uploads/'.$row['photo'].'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
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
					  echo '<img src=""../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
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

              <li class="user-footer">
                <div class="pull-left">
                  <a id="clerk_profile.php" class="btn btn-default btn-flat bg-green">Profile</a>
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
            echo '<img style="height:40px;" src=""../uploads/'.$row['photo'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>
        </div>
       <!--  <div class="pull-left info">
          <p><?php// echo "$current_user"; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i><h style="color:cyan;"> Logged In (Clerk)</h></a>
        </div> -->
      </div>

      <ul class="sidebar-menu" style="background-color:#1a000d;margin-top: 1%;">
        <li class="header glyphicon glyphicon-menu-user" style="color:black;margin-left:1%;margin-right:1%;text-align: center;background-color:#e68a00;width:99%;"><b> <div class="pull-left info">
          <p><?php echo "$current_user"; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i><h style="color:cyan;"> Logged In (Clerk)</h></a>
        </div></b></li>
        <hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;">
        <li class="treeview alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="" style="text-decoration:none;">
            <i class="fa fa-database"></i>
              <span class="glyphicon glyphicon-refresh" style="color:yellow;"></span><strong style="color:black;"> Page Refresh</strong>
          </a>
        </li>
<div id="loadchairsessionvoting" class="well pull-left" style="width: 30%;min-width: 230px;padding: 2px;"> 
  
   </div>

      </ul>
    </section>

  </aside>


  <div class="content-wrapper" style="background-color:#ffff99;">

    <section class="content-header">
      <h1>
        <p class="glyphicon glyphicon-dashboard" style="font-size:20px;"></p><b style="font-size:18px;"><i> Clerk Dashboard</b></i>
      </h1>
      <ol class="breadcrumb pull-right bg-green" style="margin-top:-0.8%;">
        <li><i class="fa fa-dashboard btn btn-warning  glyphicon glyphicon-th-large"> Polling Station: <?php  echo $pollingname; ?></i></li>
        <!-- <li><a href=""><i class="fa fa-dashboard btn btn-primary  glyphicon glyphicon-th-large"> Results</i> </a></li> -->
        <li><a href=""><i class=" btn btn-primary active"> Clerk Dashboard</i> </a></li>
      </ol>
    </section>

    <!--  end of breadcrumbs-->
    <hr class="main-footer bg-aqua" style="border-radius:4px 4px 4px 4px;margin-top:1%;margin-left:1%;margin-right:1%;">
        <div class="well pull-left" style="width: 45%;min-width: 300px;" id="votingsessionstarted">
          
        </div>
       <!--  <div class="well pull-right" style="width: 50%;min-width: 300px;" id="votingsessionprogress">
          
        </div> -->

  </div>


  <footer class="main-footer bg-aqua" style="margin-top:-1%;">
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
<div class="modal-body" id="transmitcodediv">
<span>Enter Transmission Code:</span>
  <div class="form-group has-feedback">
      <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>
      <input type="text" class="form-control" name="transmitcode" placeholder="Enter Transmission Code Here" maxlength="10" minlength="10" required>
    </div>
</div>
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
    //  setInterval(function(){
    //   $('#votingsessionprogress').load('load_voters_all_chair.php')
    // },10000);
      $.ajax({
          url:"load_voting_session.php",
          method:"POST",
          success:function(data){
            $('#votingsessionstarted').html(data);
          }
        });
        // $.ajax({
        //   url:"load_voters_all_clerk.php",
        //   method:"POST",
        //   success:function(data){
        //     $('#votingsessionprogress').html(data);
        //   }
        // });
    //    $.ajax({
    //   url:"load_voters_all_chair.php",
    //   method:"POST",
    //   success:function(data){
    //     $('#votingsessionprogress').html(data);
    //   }
    // }); 
  $('#clerk_profile').click(function(){
    updateclerkprofile();
     $('#myViewModal').modal({"backdrop":"static"});
         $("#myViewModalLabel").html("Update Clerk Profile Details");  
          $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updateclerkprofile();
         });
         //   $('#pressokay').click(function(){
         //   window.location="clerk.php";
         // });

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
 