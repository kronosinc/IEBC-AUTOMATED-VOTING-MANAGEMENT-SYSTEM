<?php
include 'check_login.php';
include 'count_records.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | ICT Dashboard</title>
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

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>MVS</span>
      <span class="logo-lg"><b>Automated Voting</b> System</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <?php
			  include '../db_config/connection.php';

			  $sql = "SELECT * FROM ict_admin where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }

				 }else{
					   echo '<img src="data:image;base64,'.$row['avatar'].'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
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

			  $sql = "SELECT * FROM ict_admin where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }

				 }else{
					  echo '<img src="data:image;base64,'.$row['avatar'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {

                  }
                   $conn->close();

			  ?>


                <p>
                  <?php echo"$current_user"; ?>
                  <small><?php echo"$regid"; ?> , ICT</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="ict_profile.php" class="btn btn-default btn-flat bg-green">Profile</a>
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

			  $sql = "SELECT * FROM ict_admin where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }

				 }else {
					  echo '<img src="data:image;base64,'.$row['avatar'].'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {

                  }
                   $conn->close();

			  ?>

        </div>
        <div class="pull-left info">
          <p><?php echo"$current_user"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>

      <ul class="sidebar-menu">



        <li class="header glyphicon glyphicon-menu-hamburger"style="color:red;margin-left:4%;margin-right:1%;"><b> NAVIGATION PANEL</b></li>

      <hr style="border:1px solid black;">
        <li class="treeview alert alert-danger" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="add_county.php" style="text-decoration:none;">
            <i class="fa fa-database"></i>
            <span><strong>Add County</strong></span>

          </a>
        </li><br>
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="add_constituency.php" style="text-decoration:none;">
            <i class="fa fa-database"></i>
            <span><strong>Add Constituency</strong></span>
          </a>
        </li><br>
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="add_ward.php" style="text-decoration:none;">
            <i class="fa fa-database"></i>
            <span><strong>Add Ward</strong></span>
          </a>
        </li><br>
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;">
          <a href="add_polling.php" style="text-decoration:none;">
            <i class="fa fa-database"></i>
            <span><strong>Add Polling </strong></span>
          </a>
        </li><hr style="border:1px solid black;">


      </ul>
    </section>

  </aside>
  <div class="content-wrapper"style="background-color:#ffff99;">


    <section class="content-header">
      <h1>
        <p class="glyphicon glyphicon-pencil" style="font-size:20px;"></p><b style="font-size:18px;"><i> County Registration Section</b></i>

      </h1>
      <ol class="breadcrumb pull-right bg-green"style="margin-top:-0.8%;">

        <li><a href="./"><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class=" btn btn-primary active glyphicon glyphicon-random"> County Registration</i> </a></li>
      </ol>
    </section>


    <hr class="main-footer bg-aqua" style="border-radius:4px 4px 4px 4px;margin-top:1%;margin-left:1%;margin-right:1%;">
  <section class="content"style="margin-top:-2.5%;">
        <div class="row">
          <section class="col-lg-12">

            <div class="box box-info"style="margin-top:-0.3%;">
              <div class="box-header"<div class="box-header"style="background-image: url('../dist/img/boxed-bg.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;">
                <i class="fa fa-graduation-cap"></i>

                   <h3 class="box-title glyphicon glyphicon-info-sign"style="color:green;"></h3><b>County Information</b>
                   <h3 class="box-title glyphicon glyphicon-info-sign" style="float:right;color:green;"></h3><b  style="float:right;"> Info<h style="color:gray;">_</h> </b>

               </div>
               <div class="box-body"style="background-color:green;">
            <div class="box-body col-lg-11"style="background-color:#d24dff;margin-left:4%;margin-top:0.5%;margin-bottom:1%;">

              <!-- <form action="add_county2.php" method="post"> -->
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="countycode" id="countycode"  placeholder="County Code" maxlength="3" minlength="3" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="countyname" id="countyname" placeholder="County Name" required>
                </div>
              </div>
              <div class="box-footer clearfix"style="background-image: url('../dist/img/purty_wood.png');background-repeat: no-repeat;  background-size: cover;background-position: center;">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send" name="addcounty" id="savecounty"> Add County
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>
			<!-- </form> -->
    </div>


  </section>


</div>

</section>
</div>
<footer class="main-footer bg-aqua"style="margin-top:-1.5%;">
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
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-header" style="background-color: blue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: #ffeade;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->
<script type="text/javascript">

    $('#savecounty').click(function(){
              var countycode=$('#countycode').val();
              var countyname=$('#countyname').val();
              var addcounty="addcounty";
              if(countycode==""){
                  $('#msg').html("Please enter Valid County Code");
                  $("#myModalLabel").html("County Code Error");
                  $("#myModal").modal('show');
              }
              else if(countyname==""){
                  $('#msg').html("Please enter Valid County Name");
                  $("#myModalLabel").html("County Name Error");
                  $("#myModal").modal('show');
              }
              else{
                        $.ajax({
        url:"add_county2.php",
        method:"POST",
        data:{addcounty:addcounty,countycode:countycode,countyname:countyname},
        dataType:"text",
        success:function(data){
          $('#msg').html(data);
          $("#myModalLabel").html("County Saving Info");
          $("#myModal").modal('show');
        }

      });
    }   
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
