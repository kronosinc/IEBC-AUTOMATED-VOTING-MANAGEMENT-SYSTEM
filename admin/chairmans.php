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

			  $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
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
					   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
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
					  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
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
                  <a href="ict_profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
					  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
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
        <li class="header">MANAGE USERS</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Chairman</span>

          </a>
          <ul class="treeview-menu">

            <li><a href="new_chairman.php"><i class="fa fa-circle-o"></i> Register New Chairman</a></li>
            <li><a href="view_chairman.php"><i class="fa fa-circle-o"></i> Customize Chairman</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>CEO</span>

          </a>
          <ul class="treeview-menu">

            <li><a href="new_ceo.php"><i class="fa fa-circle-o"></i> Register New CEO</a></li>
            <li><a href="view_ceo.php"><i class="fa fa-circle-o"></i> Customize CEO</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Registrar Officer</span>

          </a>
          <ul class="treeview-menu">

            <li><a href="new_reg.php"><i class="fa fa-circle-o"></i> Register New Registrar</a></li>
            <li><a href="view_reg.php"><i class="fa fa-circle-o"></i> Customize Registrars</a></li>
          </ul>
        </li>


		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Presiding Officer</span>

          </a>
          <ul class="treeview-menu">
            <li><a href="new_presd.php"><i class="fa fa-circle-o"></i> Register New presiding</a></li>
            <li><a href="view_presd.php"><i class="fa fa-circle-o"></i> Customize Presidings</a></li>
          </ul>
        </li>


		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>County Returning Officer</span>

          </a>
          <ul class="treeview-menu">
            <li><a href="new_countyret.php"><i class="fa fa-circle-o"></i> Register New County Reg</a></li>
            <li><a href="view_countyret.php"><i class="fa fa-circle-o"></i> Customize County Reg</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Agent Officer</span>

          </a>
          <ul class="treeview-menu">
            <li><a href="new_agent.php"><i class="fa fa-circle-o"></i> Register New Agent</a></li>
            <li><a href="view_agent.php"><i class="fa fa-circle-o"></i> Customize Agents</a></li>
          </ul>
        </li>


        <li class="header">SYSTEM MANAGEMENT</li>
     	  <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Database</span>

          </a>
          <ul class="treeview-menu">
            <li><a <a onclick="return confirm('Are you sure you want to delete all students ?');" href="delete_students.php"><i class="fa fa-circle-o"></i> Delete all students</a></li>
           <li><a <a onclick="return confirm('Are you sure you want to delete all results ?');" href="delete_results.php"><i class="fa fa-circle-o"></i> Delete all results</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="management.php">
            <i class="fa fa-database"></i>
            <span>Manage Contestants</span>
          </a>
        </li>


      </ul>
    </section>

  </aside>

  <div class="content-wrapper bg-gray">
    <section class="content-header">
      <h1>
        Dashboard

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
              include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM registrar ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close();
               ?></h3>

              <p>Registrar Officers</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="view_reg.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM presiding ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?><sup style="font-size: 20px"></sup></h3>

              <p>Presiding Officers</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="view_presd.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM returnings ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?></h3>

              <p>County Returning Officers</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-up"></i>
            </div>
            <a href="view_countyret.php?ref=PASS" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM agent ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?></h3>

              <p>Agent Officers</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-down"></i>
            </div>
            <a href="view_agent.php?ref=FAIL" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-8">

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title">AMVS Information</h3>
			  <?php
			  include '../db_config/connection.php';

			 $sql = "SELECT * FROM amvs_info";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
				 $email = $row['email'];
				 $addr = $row['addr'];
				 $phone = $row['phone'];
				 $motto= $row['motto'];

                 }
              } else {

                    }
                       $conn->close();
			  ?>

            </div>
            <div class="box-body">
			<?php


			  if(isset($_GET['db'])) {

				 ?>
				 <script>
				 alert("All results were deleted from database");
				 </script>
				 <?php
			  }
			    if(isset($_GET['db0'])) {

				 ?>
				 <script>
				 alert("Could not delete results");
				 </script>
				 <?php
			  }
			  	  if(isset($_GET['db2'])) {

				 ?>
				 <script>
				 alert("All students were deleted from database");
				 </script>
				 <?php
			  }
			    if(isset($_GET['db3'])) {

				 ?>
				 <script>
				 alert("Could not delete students");
				 </script>
				 <?php
			  }

if(isset($_GET['error'])) {
	$error = $_GET['error'];
print '<div class="callout callout-danger">
        <h4>Could not update AMVS information!</h4>
        '.$error.'
      </div>';
}
?>
              <form action="update_amvsinfo.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="uname" value="<?php echo"$uname"; ?>" placeholder="AMVS Name" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" value="<?php echo"$email"; ?>" placeholder="AMVS Email" required>
                </div>
				 <div class="form-group">
                  <input type="text" class="form-control" name="addr" value="<?php echo"$addr"; ?>" placeholder="AMVS Address" required>
                </div>
				<div class="form-group">
                  <input type="text" class="form-control" name="phone" value="<?php echo"$phone"; ?>" placeholder="AMVS Phone" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="motto" value="<?php echo"$motto"; ?>" placeholder="AMVS Motto" required>
                </div>


            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="upamvsinfo" id="sendEmail">Update AMVS Information
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>
			</form>
          </div>


        </section>

        <section class="col-lg-4">
		<div class="box box-info">
            <div class="box-header">
              <i class="fa fa-image"></i>

              <h3 class="box-title">
                AMVS Logo
              </h3>

			 <hr>
            </div>
            <div class="box-body">
						<?php
if(isset($_GET['err2'])) {
	$error = $_GET['err2'];
print '<div class="callout callout-danger">
        <h3>Could not update AMVS logo!</h3>
        '.$error.'
      </div>';
}
?>
             <?php

			  include '../db_config/connection.php';

			  $sql = "SELECT * FROM school_info";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="data:logo/jpeg;base64,'.base64_encode($row['logo'] ).'" width="170" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {

                  }
                   $conn->close();
			 ?>
            </div>

            <div class="box-footer no-border">
            <form action="update_amvs_logo.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="f1" accept="logo/*" required><br>

			     <button type="submit" class="btn btn-default" name="uplogo" id="sendEmail">Update AMVS Logo
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
