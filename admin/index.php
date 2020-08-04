<?php
// include 'check_login.php';
// include 'count_records.php';
session_start();
if (isset($_SESSION['loggedin']) && isset($_SESSION['admin_username']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['admin_username'];
  $current_user = $_SESSION['admin_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First ");
 }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | ICT Dashboard</title>
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
    <link rel="icon" href="../dist/img/icon.png">
    <style>
    .clockStyle{
      font-size: 13px;
      margin: 0 auto;
      color: white;
      font-weight: bold;
      text-align: center;
    }
    .badge{
      float:right;
      background-color: grey;
    }
    </style>
</head>
<body class="hold-transition skin-green sidebar-mini" style="opacity: 0.95;">

<div class="wrapper" style="background-color: gray;">

  <header class="main-header clockStyle ">
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

              <li class="user-footer" style="background-color: gray;">
                <div class="pull-left">
                  <!-- <a href="ict_profile.php" class="btn btn-default btn-flat bg-green">Profile</a> -->
                  <a id="ict_profile" class="btn btn-primary btn-flat bg">Profile</a>
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
      <div class="user-panel" >
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
            echo '<img src="data:image;base64,'.$row['avatar'].'" style="height:48px;" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
                     }
                   } else {

                  }
                   $conn->close();

        ?>

        </div>
        <div class="pull-left info" style="margin-top: 4%;">
          <p><?php echo"$current_user"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i><h style="color:;"> </h></a>
        </div>
      </div>
      <ul class="sidebar-menu" style="">
      <li class="header glyphicon glyphicon-menu-hamburger" style="color:white;width: 100%;background-color: #1f3f24;"><b> NAVIGATION PANEL</b></li>
        <!-- sidelinks using accordion -->
       <div class="panel-group" id="accordion">
<div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsmanageusers" >
<button class="sidebar-menu btn btn-block btn- header glyphicon glyphicon-play" style="color: black;padding: 7px;background-color: #1f3f24;"><b style="color:white;"> MANAGE USERS <span class="glyphicon glyphicon-user"></span></b></button>
</a>
</h4>
<div id="collapsmanageusers" class=" collapse in">
<div class="">
<ul class="sidebar-menu" style="color: black;">
      
        <li class="treeview alert " style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;"></i>
            <button type="button" class="btn btn-default" style="width:170px"><b style="color: ;"> Chairman</b></button>
            <span class="caret"></span>            

          </a>
          <ul class="treeview-menu" style="background-color:black;">

            <li id="newchairman"> 
            <!-- <a href="new_chairman.php" style="text-decoration:none;"> -->
            <a id="addchairmannew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px;color: black;"> Register New Chairman</button></a></li>
            <li id="viewchairman">
            <!-- <a href="view_chairman.php" style="text-decoration:none;"> -->
            <a id="addchairmanview" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px;color: black;"> Customize Chairman</button></a></li>
          </ul>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a href="#" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px"><b> CEO</b></button>
             <span class="caret"></span>  
          </a>
          <ul class="treeview-menu" style="background-color:black;">

            <li id="newceo">
            <!-- <a href="new_ceo.php"style="text-decoration:none;"> -->
            <a id="addceonew" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Register New CEO</button></a></li>
            <li id="viewceo">
            <!-- <a href="view_ceo.php"style="text-decoration:none;"> -->
            <a id="addceoview" style="text-decoration:none;">
            <i class="fa fa-circle-o"></i> <button type="button" class="btn btn-default" style="width:170px"> Customize CEO</button></a></li>
          </ul>
        </li>

     
      </ul>
</div>
</div>
</div>
<!-- end manage users panel -->
<!-- create manage regions panel -->
<div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsmanageregions" >
<button class="sidebar-menu btn btn-block btn- header glyphicon glyphicon-play" style="color: black;padding: 7px;background-color: #1f3f24;"><b style="color:white;"> MANAGE REGIONS <span class="glyphicon glyphicon-signal"></span></b></button>
</a>
</h4>
<div id="collapsmanageregions" class=" collapse ">
<div class="">
<ul class="sidebar-menu" style="background-color:;">
      
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_county.php"style="text-decoration:none;"> -->
          <a id="addcountynew" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px"><b>Add County</b></button>

          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_constituency.php"style="text-decoration:none;"> -->
          <a id="addconstituencynew" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
          <button type="button" class="btn btn-default" style="width:170px"><b>Add Constituency</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_ward.php" style="text-decoration:none;"> -->
          <a id="addwardnew" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
            <button type="button" class="btn btn-default" style="width:170px"><b>Add Ward</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_polling.php"style="text-decoration:none;"> -->
          <a id="addpollingnew" style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:16px;"></i>
           <button type="button" class="btn btn-default" style="width:170px"><b>Add Polling</b></button>
          </a>
        </li>

      </ul>
</div>
</div>
</div>
<!-- end manage regions panel -->


</div>
<!-- check if chairman is registered -->
     <?php

 include '../db_config/connection.php';

$sql = "SELECT * FROM chairman";
$result = $conn->query($sql);
 if ($result->num_rows ==1) {
    ?>
    <script type="text/javascript">
    
            $('#newchairman').hide();
    </script>
      <?php
} 
if ($result->num_rows ==null) {
    ?>
    <script type="text/javascript">
          $('#viewchairman').hide();
    </script>
      <?php
} 
//check ceo registration
$sql1 = "SELECT * FROM ceo";
$result1 = $conn->query($sql1);
 if ($result1->num_rows ==1) {
    ?>
    <script type="text/javascript">
    
            $('#newceo').hide();
    </script>
      <?php
} 
if ($result1->num_rows ==null) {
    ?>
    <script type="text/javascript">
          $('#viewceo').hide();
    </script>
      <?php
} 
$conn->close();
?>
      <!-- end of sidlinks using accordian -->
      <ul class="sidebar-menu" style="background-color:#1a000d;">
      
      </ul><br>
    </section>

  </aside>

  <div class="content-wrapper well" style="background-color:white;">
    <section class="content-header well" style="padding: 1px;margin-top: -1.7%;">
      <h1 >
        <p class="glyphicon glyphicon-dashboard " style="font-size:20px;"></p><b style="font-size:18px;"><i> ICT-Admin Dashboard</b></i>

      </h1>
      <ol class="breadcrumb" style="margin-top: -2.4%;">
        <li><a href=""><i class="fa fa-dashboard btn btn- glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class="btn btn- glyphicon glyphicon-dashboard"> Dashboard</i> </a></li>
      </ol>
 </section>

    <section class="content">
      <div class="row ">
  
      </div>


<!-- display for county,constituency,ward and Polling -->

      <div class="row well" id="regionsinfo" style="margin: 0.5%;margin-top: -3.3%;">
  
      </div>

      <div class="row well" id="viewregions" style="margin-top: -0.2%;width: 97%;margin-left: 1.5%;">
  
      </div>
    
<!--  end of breadcrumbs-->
     <!-- dsfs -->
     <!-- retreieve amvs logo -->
      <?php include '../db_config/connection.php';
        $output="";
               $sql = "SELECT * FROM amvs_info";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                echo '<div style="background-image: url(data:image;base64,'.$row['logo'].'" );background-repeat: no-repeat;  background-size: cover;background-position: bottom;opacity:1.0;min-height:600px;">';
                 // $output.= '<center><img style="width:80%;height:60px;margin-top:30%;" src="data:image;base64,'.$row['logo'].'"  alt="'.$row['uname'].'" title="'.$row['uname'].'"/></center>';

                     }
                   } else {
                    $output.= '<center>No Logo In the System. Please Update One</center>';
                  }
                   $conn->close();
       ?>
    

 <!-- sidelinks using accordion -->
       <div class="panel-group" id="accordion1">
<button type="button" class="btn btn- " data-toggle="collapse" data-parent="#accordion1" data-target="#collapseamvsinfo" ><span class=" glyphicon glyphicon-info-sign" style="font-size:100%;color:black;"> AMVS Information and Logo</span> <span class="caret"></span>
</button>
 <button style="float:right;" type="button" class="btn btn- " data-toggle="collapse" data-parent="#accordion1" data-target="#collapsemessages" ><span class=" glyphicon glyphicon-info-sign" style="font-size:100%;color:black;"> Notifications and Messages</span> <span class="badge">3</span> <span class="caret"></span> 
</button>
<div class="panel " style="background-color: #1f3f24;">
  <!-- start info and logo -->
      <div class="row collapse " id="collapseamvsinfo" style="background-color: #1f3f24;">
        <section class="col-lg-8">

          <div class="box box-info">
            <div class="box-header" style="background-color:#d4a;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-info-sign" style="font-size:18px;color:white;"> AMVS Information</h3>
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
            <div class="box-body" style="background-color:#52527a;" >

              <form action="update_amvsinfo.php" method="post">
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="uname" value="<?php echo"$uname"; ?>" placeholder="AMVS Name" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>
                  <input type="email" class="form-control" name="email" value="<?php echo"$email"; ?>" placeholder="AMVS Email" required>
                </div>
         <div class="form-group has-feedback">
           <span class="glyphicon glyphicon-map-marker form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="addr" value="<?php echo"$addr"; ?>" placeholder="AMVS Address" required>
                </div>
        <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="phone" value="<?php echo"$phone"; ?>" placeholder="AMVS Phone" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-tint form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="motto" value="<?php echo"$motto"; ?>" placeholder="AMVS Motto" required>
                </div> 
                <div class="box-footer clearfix" style="background-color:lightsteelblue;">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upamvsinfo" id="sendEmail"> Update AMVS Information
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>
      </form>
                </div>
            
          </div>


        </section>

        <section class="col-lg-4">
    <div class="box box-info" style="background-color:#4d3300;">
            <div class="box-header" style="background-color:#0040ff;">
              <i class="fa fa-image"></i>

              <h3 class="box-title">
                <p class="glyphicon glyphicon-camera" style="font-size:18px;color:white;"> AMVS Logo</p>
              </h3>


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
               $sql = "SELECT * FROM amvs_info";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="data:image;base64,'.$row['logo'].'" width="240"height="190" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo '<center>No Logo In the System. Please insert One</center>';
                  }
                   $conn->close();
       ?>
            </div>

            <div class="box-footer no-border" style="background-color:lightsteelblue;">
            <form action="update_amvs_logo.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="f1" accept="logo/*" required><br>

           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="uplogo" id="sendEmail" style="float:right;"> Update AMVS Logo
                <i class="fa fa-arrow-circle-up"></i></button>

      </form>
            </div>
          </div>
                      <div class="box-body no-padding">
              <div id="calendar" style="width: 100%"></div>
            </div>

          </div>
           
</div>
<!-- end of amvs information and logo -->

<div class="panel panel-default">
 <div class="row collapse " id="collapsemessages">
         <section class="col-lg-8">

          <div class="box box-info">
            <div class="box-header" style="background-color:#0040ff;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-info-sign" style="font-size:18px;color:white;"> Messages and Notifications</h3>
         </div>
            <div class="box-body" style="background-color:#52527a;" >

                <div class="form-group has-feedback">
               Your messages will be Displayed here
                </div>
                
                </div>
            
          </div>


        </section>


          </div>
<!-- end of messages and notifications          -->
</div>
</div>
 <!-- end of amvs information and logo  and messages-->
<!-- gvbg -->

  
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
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade " id="myViewModal" tabindex="-1" role="dialog" aria-labelledby="myViewModalLabel" aria-hidden="false" data-backdrop="false"  style="margin-left:0; ">
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false">
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
    <img src="../dist/img/loading.gif" >
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
$('#phone').val(phone);
function loadregions(){
   $.ajax({
    url:"load_regionsinfo.php",
    method:"POST",
    success:function(data){
      $('#regionsinfo').html(data);

    }
  });

}
  $(document).ready(function(){
      loadregions();
       // $("#myModal").modal('show');
       //  $("#myModal").modal({backdrop:false,show:true});
       // $(".modal-dialog").draggable({handle:".modal-header"});
  });
    var phone=2547;
       
     
//create add president modal
  $('#addpresidentnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
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
              else{
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
}
      // sjdfvg
    }));

   $('#okay').click(function(){
      loadparty();
   });
  });
//end of add president modal
//create view ictadmin modal
  $('#ict_profile').click(function(){
    updateictprofile();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update ICT ADMIN Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updateictprofile();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
         });
//end of view ictadmin modal
//create add chaiman modal
  $('#addchairmannew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newchairmanform" id="newchairmanform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone" id="phone"  placeholder="254 XXX XXX XXX" minlength="12" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@chairman.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addchairman" id="savechairman"> Add Chairman   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form>');
                  $("#myModalLabel").html("Add Chairman Details");
                  $("#myModal").modal('show');
    loadparty();
    $("#newchairmanform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
    $.ajax({
      url:"new_chairman2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Chairman Success");
        $("#serverreplay").modal('show');
      }
    }); 
      // sjdfvg
    }));

   $('#okay').click(function(){
      window.location="index.php";
   });
  });
//end of add chairman modal
//create view chaiman modal
  $('#addchairmanview').click(function(){
    updatechairman();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update Chairman Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updatechairman();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
         });
//end of view chairman modal
//create add ceo modal
  $('#addceonew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<form action="" method="POST" enctype="multipart/form-data" name="newceoform" id="newceoform" onsubmit="validatepresident()">  <div class="form-group has-feedback">  <span class="glyphicon glyphicon-user form-control-feedback" style="color:gray;"></span>   <input type="text" class="form-control" name="uname"  placeholder=" Username (FisrtName LastName)" required>  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="nid"  placeholder="National ID" minlength="8" maxlength="8" required >  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone"  placeholder="+254 XXX XXX XXX" minlength="13" maxlength="13" required >  </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>   <input type="email" class="form-control" name="email"  placeholder="xxx@ceo.org" required>  </div></div>             <div class="form-group" required>     <input type="radio"  name="gender" id="gendermale" value="Male" >Male  <input type="radio"  name="gender" id="genderfemale" value="Female" >Female  </div><div class="form-group has-feedback">    <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>  <input type="file" class="form-control" name="photo" id="photo" accept="photo//*"  onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/>  </div> <div class="form-group has-feedback">   <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>  <input type="password" class="form-control" name="pwd"  placeholder="Password" required>   </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addceo" id="saveceo"> Add CEO   <i class="fa fa-arrow-circle-up"></i></button>  <br>  </form> ');
                  $("#myModalLabel").html("Add CEO Details");
                  $("#myModal").modal('show');
    $("#newceoform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"new_ceo2.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS CEO Success");
        $("#serverreplay").modal('show');
      }
    });  
      // sjdfvg
    }));

    $('#okay').click(function(){
      window.location="index.php";
   });
  });
//end of add ceo modal
//create view ceo modal
  $('#addceoview').click(function(){
    updateceo();
     $('#myModal').modal({"backdrop":"static"});
         $("#myModalLabel").html("Update CEO Details");  
          $("#myModal").modal('show');
           $('#okay').click(function(){
          updateceo();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view ceo modal

// start county modal
  $('#addcountynew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html(' <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="countycode"  placeholder="county Code(XXXX)" id="countycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="countyname" placeholder="county Name" id="countyname" required></div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addcounty" id="savecounty"> Add county   <i class="fa fa-arrow-circle-up"></i></button>  <br>  ');
                  $("#myModalLabel").html("Add county Details");
                  $("#myModal").modal('show');
  
    $("#savecounty").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var countyname=$('#countyname').val();
              var countycode=$('#countycode').val();
              var addcounty="addcounty";
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
else{
  $.ajax({
      url:"add_county2.php",
      type:"POST",
      data:{countycode:countycode,countyname:countyname,addcounty:addcounty},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS county Success");
        $("#serverreplay").modal('show');
         loadregions();
      }
    });
}
      // sjdfvg
    });

  });
// end county modal
// start constituency modal
  $('#addconstituencynew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html(' <div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="constituencycode"  placeholder="Constituency Code(XXXX)" id="constituencycode" maxlength="4" minlength="4" required> </div><div class="form-group has-feedback"><span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span><input type="text" class="form-control" name="constituencyname" placeholder="Constituency Name" id="constituencyname" required></div> <div class="form-group"><select class="form-control" name="countycode" id="countycode" required> <option>Choose County</option> </select>  </div>  <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="addconstituency" id="saveconstituency"> Add Constituency   <i class="fa fa-arrow-circle-up"></i></button>  <br>  ');
                  $("#myModalLabel").html("Add Constituency Details");
                  $("#myModal").modal('show');
                  loadparty();
     $("#saveconstituency").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
              var countycode=$('#countycode').val();
              var constituencyname=$('#constituencyname').val();
              var constituencycode=$('#constituencycode').val();
              var addconstituency="addconstituency";
             
           if(constituencycode==""){
                  $('#replaymsg').html("Please Choose Valid constituency Code");
                  $("#servermodallabel").html("constituency Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else  if(constituencyname==""){
                  $('#replaymsg').html("Please enter Valid constituency Name");
                  $("#servermodallabel").html("constituency Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(countycode==""){
                  $('#replaymsg').html("Please Choose Valid County Code");
                  $("#servermodallabel").html("County Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else{
$.ajax({
      url:"add_constituency2.php",
      type:"POST",
      data:{constituencycode:constituencycode,constituencyname:constituencyname,addconstituency:addconstituency,countycode:countycode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS constituency Success");
        $("#serverreplay").modal('show');
         loadregions();
      }
    });
}
      // sjdfvg
    });

  });
// end constituency modal
// start ward modal
  $('#addwardnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html(' <div class="form-group has-feedback"><span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="wardcode" id="wardcode"  placeholder="Ward Code" maxlength="5" minlength="5" required>  </div><div class="form-group has-feedback">     <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>    <input type="text" class="form-control" name="wardname" id="wardname" placeholder="Ward Name" required> </div>  <div class="form-group"> <select class="form-control" name="countycode" id="countycode" required>    <option>Choose County</option>  </select>   </div><div class="form-group">      <select class="form-control" name="constituencycode" id="constituencycode" required>     <option>Choose County First</option>  </select>  </div>  <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addward" id="saveward"> Add Ward   <i class="fa fa-arrow-circle-up"></i></button>  <br>  ');
                  $("#myModalLabel").html("Add Ward Details");
                  $("#myModal").modal('show');
                 
                  loadparty();
     $("#saveward").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
             var countycode=$('#countycode').val();
              var constituencycode=$('#constituencycode').val();
              var wardname=$('#wardname').val();
              var wardcode=$('#wardcode').val();
              var addward="addward";
             
           if(wardcode==""){
                  $('#replaymsg').html("Please Choose Valid ward Code");
                  $("#servermodallabel").html("ward Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else  if(wardname==""){
                  $('#replaymsg').html("Please enter Valid ward Name");
                  $("#servermodallabel").html("ward Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(constituencycode==""){
                  $('#replaymsg').html("Please Choose Valid Constituency Code");
                  $("#servermodallabel").html("Constituency Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(countycode==""){
                  $('#replaymsg').html("Please Choose Valid County Code");
                  $("#servermodallabel").html("County Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else{
$.ajax({
      url:"add_ward2.php",
      type:"POST",
      data:{constituencycode:constituencycode,wardname:wardname,addward:addward,wardcode:wardcode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS ward Success");
        $("#serverreplay").modal('show');
         loadregions();
      }
    });
}
      // sjdfvg
    });

  });
// end ward modal
// start polling modal
  $('#addpollingnew').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    
      // $('#myModal').on('hide.bs.modal',function(e){
      //   e.preventDefault();
      // });
       $('#msg').html('<div class="form-group has-feedback"> <span class="glyphicon glyphicon-certificate form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="pollingcode" id="pollingcode"  placeholder="Polling Code" maxlength="6" minlength="6" required>  </div><div class="form-group has-feedback">   <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="pollingname" id="pollingname" placeholder="Polling Name" required> </div>   <div class="form-group"> <select class="form-control" name="countycode" id="countycode" required>    <option value="">Choose County</option> </select> </div>   <div class="form-group"> <select class="form-control" name="constituencycode" id="constituencycode" required>  <option value="">Choose County First</option> </select> </div>   <div class="form-group">  <select class="form-control" name="wardcode" id="wardcode" required>  <option value="">Choose Constituency First</option>   </select>    </div> <button type="submit" class="pull-right btn btn-success glyphicon glyphicon-send" name="addpolling" id="savepolling"> Add Polling   <i class="fa fa-arrow-circle-up"></i></button>  <br>  ');
                  $("#myModalLabel").html("Add Polling Details");
                  $("#myModal").modal('show');
                 
                  loadparty();
     $("#savepolling").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
             var countycode=$('#countycode').val();
              var constituencycode=$('#constituencycode').val();
               var wardcode=$('#wardcode').val();
              var pollingname=$('#pollingname').val();
              var pollingcode=$('#pollingcode').val();
              var addpolling="addpolling";
           if(pollingcode==""){
                  $('#replaymsg').html("Please Choose Valid Polling Code");
                  $("#servermodallabel").html("Polling Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else  if(pollingname==""){
                  $('#replaymsg').html("Please enter Valid Polling Name");
                  $("#servermodallabel").html("Polling Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(countycode==""){
                  $('#replaymsg').html("Please Choose Valid County Code");
                  $("#servermodallabel").html("County Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(constituencycode==""){
                  $('#replaymsg').html("Please Choose Valid Constituency Code");
                  $("#servermodallabel").html("Constituency Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(wardcode==""){
                  $('#replaymsg').html("Please Choose Valid Ward Code");
                  $("#servermodallabel").html("Ward Code Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               
              else{
$.ajax({
      url:"add_polling2.php",
      type:"POST",
      data:{pollingcode:pollingcode,pollingname:pollingname,addpolling:addpolling,wardcode:wardcode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Polling Success");
        $("#serverreplay").modal('show');
         loadregions();
      }
    });
}
      // sjdfvg
    });

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
    url:"load_party.php",
    method:"POST",
    success:function(data){
      $('#partycode').html(data);
    }
  });  
          //load counties
           $.ajax({
    url:"load_county.php",
    method:"POST",
    success:function(data){
      $('#countycode').html(data);
    }
  });
           //laod constituencies
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
           //load ward
            $('#constituencycode').change(function(){
      var constituencycode=$('#constituencycode').val();
      //load ward
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
      }
   
      // update chairman information
      function updatechairman(){
       $.ajax({
          url:"load_update_chairman.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
       function updateceo(){
       $.ajax({
          url:"load_update_ceo.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
      function updateictprofile(){
       $.ajax({
          url:"load_update_ict.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
      
           
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
