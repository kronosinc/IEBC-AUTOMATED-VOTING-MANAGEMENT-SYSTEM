<?php
include 'check_login_registrar.php';
include 'count_records.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | Registrar Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <link rel="icon" href="../dist/img/icon.png">

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
    table {
      width: 90%;
      box-shadow: 0 0 1px 1px #ccc;
      margin-top: -1.5%;
      border-radius:4px 4px 4px 4px;
    }
    table, th, td {
      border: 1px solid green;
      border-collapse: collapse;
      opacity: 0.95;
    }
    th, td {
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #a70000;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #e8e8e8;
    }
    tr:nth-child(odd) {
      background-color: white;
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

			  $sql = "SELECT * FROM registrar where email='$myusername'";
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

			  $sql = "SELECT * FROM registrar where email='$myusername'";
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
                  <small><?php echo"$regid"; ?> , REGISTRAR</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="registrar_profile.php" class="btn btn-default btn-flat bg-green">Profile</a>
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

        $sql = "SELECT * FROM registrar where  email='$myusername'";
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
          <a href="#"><i class="fa fa-circle text-success"></i><h style="color:cyan;"> Logged In (Registrar)</h></a>
        </div>
      </div>


      <ul class="sidebar-menu">
      <li class="header glyphicon glyphicon-menu-hamburger"style="color:red;margin-left:4%;margin-right:1%;"><b> NAVIGATION PANEL</b></li>
      <hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;">
        <li class="treeview alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="" style="text-decoration:none;">
            <i class="fa fa-database"></i>
              <span class="glyphicon glyphicon-refresh" style="color:yellow;"></span><strong style="color:black;"> Page Refresh</strong>
          </a>
        </li>
<hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;">
        <table id="bod"class="countdownContainer" style="margin-top:-15%;">
          <tr class="info">
            <td colspan="4" class="info" style="background-color:black;color:green;"><b>Registration Countdown</b></td>
          </tr>
          <tr class="info" style="background-color:black;color:white;">
            <td id="days">120</td>
            <td id="hours">4</td>
            <td id="minutes">12</td>
            <td id="seconds" style="color:red;"><b>22</b></td>
          </tr>
          <tr style="background-color:e8e8e8;">
            <td>Days</td>
            <td>Hours</td>
            <td>Minutes</td>
            <td>Seconds</td>
          </tr>
        </table>

        <br><br><br><br><br><br>
        <hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;margin-top:-1.5%;">
        <?php
        include '../db_config/connection.php';

        $sql = "SELECT * FROM registrar where email='$myusername'";
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
        echo '<img style="height:130px;width:90%;margin-left:4%;" src="data:image;base64,'.$row["photo"].'" class="user-image image-cropper" alt="'.$current_user.'" title="'.$current_user.'"/>';
        }
           }
         } else {

        }
         $conn->close();

        ?>
<hr style="border: 1px solid darkslategray;border-radius: 4px 4px 4px 4px;margin-top:2%;">
        </ul>
    </section>

  </aside>





<!--  content-->

  <div class="content-wrapper"style="background-color:#ffff99;">


    <section class="content-header">
      <h1>
        <p class="glyphicon glyphicon-pencil" style="font-size:20px;"></p><b style="font-size:18px;"><i> Voter Registration Section</b></i>

      </h1>
      <ol class="breadcrumb pull-right bg-green"style="margin-top:-0.8%;">

        <li><a href="view_voter.php"><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-th-large"> Customize</i> </a></li>
        <li><a href=""><i class=" btn btn-primary active glyphicon glyphicon-random"> Registrar Dashboard</i> </a></li>
      </ol>
    </section>


  <!--  end of breadcrumbs-->
  <hr class="main-footer bg-aqua" style="border-radius:4px 4px 4px 4px;margin-top:1%;margin-left:1%;margin-right:1%;">
<section class="content "style="margin-top:-2.5%;">
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info" style="margin-top:-0.3%;">
            <div class="box-header"style="background-image: url('../dist/img/boxed-bg.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-user"style="color:green;"></h3><b> Voter Information</b>
              <h3 class="box-title glyphicon glyphicon-info-sign" style="float:right;color:green;"></h3><b  style="float:right;"> Info<h style="color:gray;">_</h> </b>

            </div>
             <div class="box-body"style="background-color:green;">

            <div class="box-body col-lg-5 bg-aqua"style="margin-left:3%;margin-top:0.3%;">

              <form action="add_voter.php" method="post" enctype="multipart/form-data">
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
                          <input type="radio"  name="gender" value="Male" >Male<br>
                          <input type="radio"  name="gender" value="Female" >Female
                        </div>
               </div>

            <div class="box-body col-lg-5 bg-aqua" style="margin-left:10%;margin-top:0.3%;">

              <div class="form-group">
                <select class="form-control" name="county" id="countycode" required>
                  <option>Choose County</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="constituency" id="constituencycode" required>
                  <option>Choose Constituency</option>
                  <option>Choose County First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="ward" id="wardcode" required>
                  <option>Choose Ward</option>
                    <option>Choose constituency First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="polling" id="pollingcode" >
                  <option>Choose Polling</option>
                  <option>Choose Ward First</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>
                <input type="file" class="form-control" name="photo" accept="photo/*" required><br>
              </div>
            </div>

            <div class="box-footer clearfix"style="background-image: url('../dist/img/purty_wood.png');background-repeat: no-repeat;  background-size: cover;background-position: center;">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send " name="addvoter" id="sendEmail"> Register Voter
                <i class="fa fa-arrow-circle-up "></i></button>
            </div>

      </form>
    </div>


  </div>
</section>
</div>

</section>
</div>
<footer class="main-footer bg-aqua"style="margin-top:-1.5%;">
<div class="pull-right hidden-xs">
<b>AMVS@2018</b>
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">Online Election System</a>.</strong> All rights
reserved.
</footer>


<div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url:"load_county.php",
        method:"POST",
        success:function(data){
          $('#countycode').html(data);
        }
      });
      });
      //display on changing value  of county
      $('#countycode').change(function(){
        var countycode=$('#countycode').val();
        //load constituency
        $.ajax({
          url:"load_constituency.php",
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
        //load constituency
        $.ajax({
          url:"load_ward.php",
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
      //load polling
      $.ajax({
        url:"load_polling.php",
        method:"POST",
        data:{wardcode:wardcode},
        dataType:"text",
        success:function(data){
          $('#pollingcode').html(data);
        }
      });
  });
</script>


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
