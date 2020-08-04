<?php
include 'check_login.php';
include 'count_records.php';
if(isset($_GET['ref'])) {
	$agentid = $_GET['ref'];
	include '../db_config/connection.php';

	$sql = "SELECT * FROM registrar where id = '$agentid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
			$fullname= $row['uname'];
        $phone = $row['phone'];
		$email = $row['email'];
		//$address = $row['address'];
    }
} else {

}
$conn->close();

}else{
	header("location:./");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | <?php echo"$fullname"; ?></title>
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
      <span class="logo-mini"><b>A</B>MVS</span>
      <span class="logo-lg"><b>Automated</b> Voting</span>
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
                  <small><?php echo"$regid"; ?> , Admin</small>
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
				<li class="header glyphicon glyphicon-wrench"style="color:red;margin-left:4%;margin-right:1%;"><b> NAVIGATION PANEL</b></li><hr style="border:1px solid black;">
				<li class="treeview alert alert-danger" style="margin-left:4%;margin-right:4%;font-size:15px;" >
					<a href=""style="text-decoration:none;">
						<i class="fa fa-user"></i>
						<span class="glyphicon glyphicon-refresh"><b> Refresh Page</b></span>

					</a>

				</li><hr style="border:1px solid black;">
      </ul>
    </section>

  </aside>

  <div class="content-wrapper"style="background-color:#ffff99;">
    <section class="content-header">
      <h1 class="glyphicon glyphicon-save"></h1>
        <h style="font-size:25px;"><b><i>Update Registrar</i></b> <b style="color:blue;">(<?php echo"$agentid"; ?>)</b></h>


      <ol class="breadcrumb">
				<li><a href="view_reg.php"><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-circle-arrow-left"> Back</i> </a></li>
				 <li><i class=" btn btn-primary active">Update Registrar <?php echo"$agentid"; ?> </i></li>
      </ol>
    </section>

    <section class="content">

      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info bg-gray">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <p class="box-title glyphicon glyphicon-info-sign"></p> <h style="font-size:20px;"><b> <?php echo"$fullname"; ?></b> Information</h>


            </div>
            <div class="box-body" style="background-color:#33cc33;">
			<?php
if(isset($_GET['error'])) {
	$error = $_GET['error'];
print '<div class="callout callout-warning">
        <h4>Could not update record!</h4>
        '.$error.'
      </div>';
}
?>

			<?php
if(isset($_GET['msg'])) {
	$error = $_GET['msg'];
print '<div class="callout callout-warning">
        <h4>Could not update record!</h4>
        '.$error.'
      </div>';
}
?>

			<?php
if(isset($_GET['message'])) {
	$error = $_GET['message'];
print '<div class="callout callout-success">
        <h4>'.$error.'</h4>
        Default password is 123456
      </div>';
}
?>
              <form action="save_update_reg.php?ref=<?php echo"$agentid"; ?>" method="post">
                <div class="form-group has-feedback">
									<span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="phone"  value="<?php echo"$phone"; ?>" placeholder="Registrar Phone Number" required>

                </div>
                <div class="form-group has-feedback">
									<span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>
                  <input type="email" class="form-control" name="email"  value="<?php echo"$email"; ?>" placeholder="Registrar Email" required>
                </div>


            </div>
            <div class="box-footer clearfix bg-green">
              <button onclick="return confirm('Are you sure you want to Update')" type="submit" class="pull-right btn btn-warning glyphicon glyphicon-send" name="newreg" id="sendEmail"> Update <?php echo"$fullname"; ?>
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>

          </div>
        </section>
      </div>

    </section>
  </div>

  <footer class="main-footer bg-aqua">
    <div class="pull-right hidden-xs">
      <b>AMVS@2018</b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">Online Election System</a>.</strong> All rights
    reserved.
  </footer>



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
