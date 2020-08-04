<?php
include 'check_login.php';
include 'count_records.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CEO | ICT Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
          <a href=""><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>

      <ul class="sidebar-menu">

        <li class="header glyphicon glyphicon-wrench"style="color:red;margin-left:4%;margin-right:1%;"><b> NAVIGATION PANEL</b></li><hr style="border:1px solid black;">
        <li class="treeview  alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;" >
          <a href=""style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span class="glyphicon glyphicon-refresh"><b> Refresh Page</b></span>

          </a>

        </li><hr style="border:1px solid black;">
        <li class="treeview  alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;" >
         <a href="view_chairman.php"style="text-decoration:none;">
           <i class="fa fa-user"></i>
           <span><b>Customize Chairman</b></span>

         </a>

       </li><hr style="border:1px solid black;">

      </ul>
    </section>

  </aside>

  <div class="content-wrapper"style="background-color:#ffff99;">
    <section class="content-header">
      <h1>
        <p class="glyphicon glyphicon-upload" style="font-size:20px;"></p><b><i> AMVS CEO Credentials</b></i>

      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class=" btn btn-primary active"> Uploaded CEO</i> </a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-xs-6"style="margin-top:-0.3%;">
          <div class="small-box bg-aqua">
            <div class="inner">



            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-down"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-7 bg-aqua"style="margin-top:-1.5%;">

          <div class="box box-info">
            <div class="box-header bg-blue">
              <i class="fa fa-graduation-cap"></i>

                <h3 class="box-title glyphicon glyphicon-info-sign"></h3><b>CEO Information</b>
			  <?php
			  include '../db_config/connection.php';

			 $sql = "SELECT * FROM ceo";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
				 $email = $row['email'];
				 $nid = $row['nid'];
				 $phone = $row['phone'];


                 }
              } else {

                    }
                       $conn->close();
			  ?>

            </div>
            <div class="box-body">

              <form action="update_ceo.php" method="post">
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="uname" value="<?php echo"$uname"; ?>" placeholder="Firstname & Lastname" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>
                  <input type="email" class="form-control" name="email" value="<?php echo"$email"; ?>" placeholder="CEO Email" required>
                </div>
				        <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="nid" value="<?php echo"$nid"; ?>" placeholder="National ID" maxlength="8" required>
                </div>
				        <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="phone" value="<?php echo"$phone"; ?>" placeholder="CEO Telphone" maxlength="13" required>
                </div>

            </div>
            <div class="box-footer clearfix bg-gray">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upceo" id="sendEmail"> Update CEO Credentials
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>
			</form>
          </div>


        </section>

        <section class="col-lg-5"style="margin-top:-1.5%;">
		<div class="box box-info">
            <div class="box-header bg-blue">
              <i class="fa fa-image"></i>

              <h3 class="box-title">
                  <h3 class="box-title glyphicon glyphicon-picture"></h3><b> CEO Photo<b>
              </h3>

			 <hr>
            </div>
            <div class="box-body">
						<?php
if(isset($_GET['err2'])) {
	$error = $_GET['err2'];
print '<div class="callout callout-danger">
        <h4>Could not update CEO photo!</h4>
        '.$error.'
      </div>';
}
?>
             <?php

			  include '../db_config/connection.php';

			  $sql = "SELECT * FROM ceo";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="data:image;base64,'.$row['photo'].'" width="170" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {

                  }
                   $conn->close();
			 ?>
            </div>

            <div class="box-footer no-border bg-gray">
            <form action="update_ceo_photo.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="f1" accept="image/*" required><br>

			     <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update CEO Photo
                <i class="fa fa-arrow-circle-up"></i></button>
			</form>
            </div>
          </div>
                      <div class="box-body no-padding">
              <div id="calendar" style="width: 100%"></div>
            </div>

          </div>

        </section>
      </div>

    </section>
  </div>
  <footer class="main-footer bg-aqua">
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
