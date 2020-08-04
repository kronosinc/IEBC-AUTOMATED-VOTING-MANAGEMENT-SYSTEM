<?php
include 'check_login.php';
include 'count_records.php';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | Polling Custom</title>
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
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span class="glyphicon glyphicon-refresh"><b> Refresh Page</b></span>

          </a>

        </li>
          </li><hr style="border:1px solid black;">
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;" >
          <a href="view_counties.php"style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span><b>Customize Counties</b></span>

          </a>

        </li><br>
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;" >
          <a href="view_constituencies.php"style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span><b>Customize Constituencies</b></span>

          </a>

        </li><br>
        <li class="treeview alert alert-success" style="margin-left:4%;margin-right:4%;font-size:15px;" >
          <a href="view_wards.php"style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span><b>Customize Wards</b></span>

          </a>

        </li><br>


        <li class="treeview alert alert-danger" style="margin-left:4%;margin-right:4%;font-size:15px;" >
          <a href="view_pollings.php"style="text-decoration:none;">
            <i class="fa fa-user"></i>
            <span><b>Customize Polling Stations</b></span>

          </a>

        </li>
          </li><hr style="border:1px solid black;">
      </ul>
    </section>

  </aside>

  <div class="content-wrapper"style="background-color:#ffff99;">
    <section class="content-header">
      <h1>
      <p class="glyphicon glyphicon-upload" style="font-size:18px;color:black;"></p><b><i> <h style="font-size:20px;color:green;"> Uploaded Polling Stations</h></b></i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard btn btn-primary disabled glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class=" btn btn-primary active"> Uploaded Polling Stations</i> </a></li>
      </ol>
    </section>

    <section class="content">

      <div class="row">
        <section class="col-lg-12 ">

          <div class="box box-info bg-gray">
            <div class="box-header">
              <i class="fa fa-users"></i>

            <h3 class="box-title glyphicon glyphicon-file"></h3><b>Polling Stations found on Database</b>

            <h3 class="box-title glyphicon glyphicon-search" style="margin-left:54%;"></h3>
            <input style="float:right;background-color:white;border-radius:12px 12px 12px 12px;border:2px solid red;text-align:center;" type="text" id="search" name="term" placeholder="Filter by Polling Name"maxlength="8" onkeyup="searchJosshua()">



            </div>
            <div class="box-body"style="background-color:#ffa366;">
		<table class="table" id="myDisplay">
                <tbody><tr>
                  <th>Polling Id</th>
                  <th>Polling Code</th>
                  <th>Polling Name</th>
                  <th>Ward Code</th>
                  <th>Options</th>
                </tr>
               <tbody>
                 <?php
        			   include '../db_config/connection.php';
        			   error_reporting(0);
        			    $page =$_GET['page'];
        									   if ($page=="" || $page=="1")
        									   {
        										   $page1=0;
        									   }else{
        										   $page1=($page*5)-5;
        									   }

        			   $sql = "SELECT * FROM polling  ORDER BY pollingcode limit $page1,5";
                     $result = $conn->query($sql);

                     if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["Sno"]. "</td><td>" . $row["pollingcode"]. "</td><td>". $row['pollingname']. "</td><td>". $row['wardcode']. "</td>";
		    print '<td><a title="Edit '.$row["pollingname"].'" class="btn btn-block btn-primary btn-xs" href="update_polling.php?ref='.$row["Sno"].'"><i class="fa fa-edit">Edit</i></a>
			<a '; ?> 	<a onclick="return confirm('Are you sure you want to delete <?php echo $row['pollingname']; ?> ?');" <?php print 'title="Delete '.$row["pollingname"].'" class="btn btn-block btn-danger btn-xs" href="delete_polling.php?ref='.$row["id"].'&page='.$page1.'"><i class="fa fa-trash-o">Delete</i></a>

			</td>';
               }
               } else {
                print '<div class="callout callout-success">
        <h4>You have not registered any student</h4>
        Registered student will be shown here
      </div>';
                  }
                 $conn->close();
			   ?>

              </tbody></table>
              <ul class="pagination">
			  <?php
						 include '../db_config/connection.php';
						$sql = "SELECT * FROM polling  ORDER BY pollingcode ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	print '<tr><td colspan="10">';
$ragents=mysqli_num_rows($result);
$a = $ragents/5;
$a = ceil($a);
for ($b=1;$b<=$a;$b++)
{
	?> <li class="paginate_button"><a href="view_pollings.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
}
}
$conn->close();
						?>

			  </ul>

            </div>

			</form>
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

<script>
function searchJosshua()
{
  var input ,table,tr,td,i, filter;
  input=document.getElementById("search");
  filter=input.value.toUpperCase();
  table=document.getElementById("myDisplay");
  tr=table.getElementsByTagName("tr");
  for(i=0; i<tr.length; i++)
  {
    td= tr[i].getElementsByTagName("td")[2];
    if(td)
    {if(td.innerHTML.toUpperCase().indexOf(filter)>-1)
    {
      tr[i].style.display = "";
    }
    else
    {
      tr[i].style.display="none";
    }
   }

  }
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
