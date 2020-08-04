<?php
//include 'check_login_user.php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
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

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</B>MVS</span>
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
                  <a id="chairman_profile" class="btn btn-default btn-flat bg-green">Profile</a>
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
        <div class="pull-left info" style="margin-top:4%;">
          <p><?php echo"$current_user"; ?></p>
        </div>
      </div>

       <div class="panel panel-default">
<h4 class="" >
<a data-toggle="collapse" data-parent="#accordion" href="#collapsvotingregistration" >
<button class="sidebar-menu btn btn-block btn-primary active header glyphicon glyphicon-user" style="color: black;padding: 7px;background-color: gray;"><b>Management Section <span class="caret"></span></b></button>
</a>
</h4>
      <div id="collapsvotingregistration" class=" collapse in">
<div class="">
      <ul class="sidebar-menu" style="background-color:;">
      
      <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
        <a id="addpresidentnew" style="text-decoration:none;">
          <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
         <button type="button" class="btn btn-default" style="font-size:12px;"><b>Add President</b></button>
        </a>
      </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <a  style="text-decoration:none;" id="addgovernornew">
          <!-- <a href="add_president.php"style="text-decoration:none;"> -->
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b> Add Governor</b></button>
          </a>
        </li>
        
         <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="addsenatornew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Add Senator</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="addwomenrepnew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Add Women Rep</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="addmpnew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Add MP</b></button>
          </a>
        </li>
        <li class="treeview alert alert" style="margin-left:1%;margin-right:1%;">
          <!-- <a href="add_party.php" style="text-decoration:none;"> -->
           <a id="addmcanew"  style="text-decoration:none;">
            <i class="fa fa-user glyphicon glyphicon-play" style="text-decoration:none; color:#e68a00;font-size:10px;"></i>
            <button type="button" class="btn btn-default" style="font-size:12px;"><b>Add MCA</b></button>
          </a>
        </li>

      </ul>
</div>
</div>
</div>
<div id="loadchairsessionvoting" class="well pull-left" style="width: 30%;min-width: 230px;margin-top: -5%;"> 
  
   </div>
    </section>

  </aside>
  <div class="content-wrapper well" style="background-color:white;">
    <section class="content-header well" style="padding: 1px;margin-top: -1.7%;">
      <h1 >
        <p class="glyphicon glyphicon-dashboard " style="font-size:20px;"></p><b style="font-size:18px;"><i> Chairman Dashboard</b></i>

      </h1>
      <ol class="breadcrumb" style="margin-top: -2.4%;">
        <li><a href="index.php"><i class="fa fa-dashboard btn btn- glyphicon glyphicon-home"> Home</i> </a></li>
        <li><a href=""><i class="btn btn- glyphicon glyphicon-dashboard"> Dashboard</i> </a></li>
      </ol>
 </section>
 <section class=" content well pull-left" style="margin-top: -1.7%;width: 100%;min-width: 300px;">
	<?php
  include '../db_config/connection.php';
		$select_president="SELECT president.Sno,president.photo,president.uname,president.partycode,party.partycode,party.partyname from president,party where  president.partycode=party.partycode ";
		$select_governor="SELECT governor.Sno,governor.photo,governor.uname,governor.partycode,party.partycode,party.partyname from governor,party where  governor.partycode=party.partycode";
		$select_senator="SELECT senator.Sno,senator.photo,senator.uname,senator.partycode,party.partycode,party.partyname from senator,party where  senator.partycode=party.partycode";
    $select_womenrep="SELECT womenrep.Sno,womenrep.photo,womenrep.uname,womenrep.partycode,party.partycode,party.partyname from womenrep,party where  womenrep.partycode=party.partycode";
    $select_mp="SELECT mp.Sno,mp.photo,mp.uname,mp.partycode,party.partycode,party.partyname from mp,party where  mp.partycode=party.partycode";
    $select_mca="SELECT mca.Sno,mca.photo,mca.uname,mca.partycode,party.partycode,party.partyname from mca,party where  mca.partycode=party.partycode";
	 ?>

<!-- create candidates tabs -->
 <div class=" pull-left notifications well" style="width: 100%;">
                    <!-- <h3 style="color: ">Voters, Votes and Contestants Participated Results</h3> -->
                    <ul id="myTab" class="nav nav-tabs">
                       <li class="active"><a href="#viewpresidentvotes" data-toggle="tab">President</a></li>
                        <li><a href="#viewgovernorvotes" data-toggle="tab">Governor</a></li>
                       <li><a href="#viewsenatorvotes" data-toggle="tab">Senator</a></li>
                        <li > <a href="#viewwomenrepvotes" data-toggle="tab">Women Rep </a></li>
                       <li><a href="#viewmpvotes" data-toggle="tab">Member Of Parliament</a></li>
                       <li><a href="#viewmcavotes" data-toggle="tab">MCA </a></li>
                       <!-- <li><a href="#viewmessagevotes" data-toggle="tab">Messages </a></li> -->
                 </ul>
            <div id="myTabContent" class="tab-content" style="margin-top: 1%;">
       
                <div class="tab-pane fade in active" id="viewpresidentvotes">
                    <!-- start presidential -->
             
                      <div class="table-responsive">
                            <table class="table table-responsive table-condensed table-bordered president " id="example" style="width: 100%;">
                            <caption>Presidential Candidates.</caption>
                            <thead>
                                  <tr style="padding: 10px;">
                                 <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">President Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
                                    
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
         
                   
             
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
                                  <?php
         include '../db_config/connection.php';
    
                     ?>
        
      <?php
    $output_president='';
    //select all presidential Candidates
      $result_president=mysqli_query($conn,$select_president);
      if(mysqli_num_rows($result_president)>0){
        while ($row=mysqli_fetch_array($result_president)) {
          $output_president.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editpresident" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletepresident" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td></tr>';
        }
      } else{

          $output_president='<tr><td colspan="2">No President Candidate Found';
        }
        echo $output_president;
      ?>
        </table>
         

                                </tbody>
                            </table>
             
                         </div>
                 <!-- end presidential -->
                </div>
                <div class="tab-pane fade" id="viewgovernorvotes">
                          <!-- start governor -->
                         
         
                              <div class="table-responsive">
                            <table class="table table-responsive table-responsive "  style="width: 100%;">
                            <caption>Governor Candidates</caption>
                            <thead>
                                 <tr style="padding: 10px;">
                                  <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">Governor Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
         
             
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
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
///Display governor votes
                       
         ?>
          <?php
      $output_governor='';
      //select all gobenatorial Candidates
        $result_governor=mysqli_query($conn,$select_governor);
        if(mysqli_num_rows($result_governor)>0){
          while ($row=mysqli_fetch_array($result_governor)) {
            $output_governor.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editgovernor" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletegovernor" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td>';
          }
        } else{

            $output_governor='<tr><td colspan="2">No Governor Candidate Found';
          }
          echo $output_governor;
        ?>

                                </tbody>
                            </table>
                   
                         </div>
                    <!-- end governor -->
                </div>
                <div class="tab-pane fade" id="viewsenatorvotes">
                                <!-- start senator -->
                 
                                <div class="table-responsive">
                            <table class="table table-responsive " style="width: 100%;">
                            <caption>Senator Candidates</caption>
                            <thead>
                                  <tr style="padding: 10px;">
                                   <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">Senator Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
         
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
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
//Display senator votes
                                    
         ?>
          <?php
    $output_senator='';
    //select all gobenatorial Candidates
      $result_senator=mysqli_query($conn,$select_senator);
      if(mysqli_num_rows($result_senator)>0){
        while ($row=mysqli_fetch_array($result_senator)) {
          $output_senator.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editsenator" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletesenator" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td>';
        }
      } else{

          $output_senator='<tr><td colspan="2">No Senator Candidate Found';
        }
        echo $output_senator;
      ?>

                                </tbody>
                            </table>
                          
                         </div>
                         <!-- end senator -->
                </div>
                <div class="tab-pane fade" id="viewwomenrepvotes">
                                <div class="table-responsive">
                            <table class="table table-responsive table-responsive " style="width: 100%;">
                            <caption>Women Rep Candidates</caption>
                            <thead>
                                 <tr style="padding: 10px;">
                                  <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">Women Rep Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
          
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
                                  <?php
         include '../db_config/connection.php';
    error_reporting(0);
  
                    
         ?>
         <?php
  $output_womenrep='';
  //select all gobenatorial Candidates
    $result_womenrep=mysqli_query($conn,$select_womenrep);
    if(mysqli_num_rows($result_womenrep)>0){
      while ($row=mysqli_fetch_array($result_womenrep)) {
        $output_womenrep.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editwomenrep" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletewomenrep" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td>';
      }
    } else{

        $output_womenrep='<tr><td colspan="2">No WomenRep Candidate Found';
      }
      echo $output_womenrep;
    ?>

                                </tbody>
                            </table>
                   
                         </div>
                    <!-- end women rep -->
                </div>
                 <div class="tab-pane fade" id="viewmpvotes">
                                <div class="table-responsive">
                            <table class="table table-responsive  " style="width: 100%;">
                             <caption>MP Candidates.</caption>
                            <thead>
                                 <tr style="padding: 10px;">
                                  <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">MP Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
          
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
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
//Display mp votes
                      
         ?>
          <?php
  $output_mp='';
  //select all mp Candidates
    $result_mp=mysqli_query($conn,$select_mp);
    if(mysqli_num_rows($result_mp)>0){
      while ($row=mysqli_fetch_array($result_mp)) {
        $output_mp.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editmp" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletemp" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td>';
      }
    } else{

        $output_mp='<tr><td colspan="2">No MP Candidate Found';
      }
      echo $output_mp;
    ?>

                                </tbody>
                            </table>
                             <ul class="pagination">
                        <?php
                             include '../db_config/connection.php';
                            $sql = "SELECT * FROM presiding ORDER BY county";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  print '<tr><td colspan="10">';
                                $ragents=mysqli_num_rows($result);
                                $a = $ragents/5;
                                $a = ceil($a);
                                for ($b=1;$b<=$a;$b++)
                                {
                                  ?> <li class="paginate_button"><a href="view_presd.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
                          }
                          }
                          $conn->close();

                                      ?>

        </ul>
                         </div>
                    <!-- end mp -->
                </div>
                <div class="tab-pane fade" id="viewmcavotes">
                                 <div class="table-responsive">
                            <table class="table table-responsive table-responsive " style="width: 100%;">
                             <caption>MCA Candidates.</caption>
                            <thead>
                                  <tr style="padding: 10px;">
                                  <th style="font-size: 15px;">Photo</th>
                                     <th style="font-size: 15px;">MCA Name</th>
                                      <th style="font-size: 15px;">Party</th>
                                     <th style="font-size: 15px;">Actions</th>
        <?php
         include '../db_config/connection.php';
         $counts='';
         $polling1=0;
         
           $conn->close();
           ?>
            </tr>
                                </thead>
                                <tbody >
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
//Display mca votes
                    
         ?>
          <?php
  $output_mca='';
  //select all mca Candidates
    $result_mca=mysqli_query($conn,$select_mca);
    if(mysqli_num_rows($result_mca)>0){
      while ($row=mysqli_fetch_array($result_mca)) {
        $output_mca.='<tr><td> <img width="80px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td>'.$row["uname"].' </td><td>'.$row["partyname"].' </td><td><button class="btn btn-small btn-info editmca" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Edit</button>&nbsp<button class="btn btn-small btn-warning deletemca" data-id1="'.$row['Sno'].'" data-id2="'.$row['uname'].'">Delete</button></td>';
      }
    } else{

        $output_mca='<tr><td colspan="2">No MCA Candidate Found';
      }
      echo $output_mca;
    ?>

                                </tbody>
                            </table>
                             <ul class="pagination">
                        <?php
                             include '../db_config/connection.php';
                            $sql = "SELECT * FROM presiding ORDER BY county";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  print '<tr><td colspan="10">';
                                $ragents=mysqli_num_rows($result);
                                $a = $ragents/5;
                                $a = ceil($a);
                                for ($b=1;$b<=$a;$b++)
                                {
                                  ?> <li class="paginate_button"><a href="view_presd.php?page=<?php echo $b; ?>" ><?php echo $b. " "; ?></a></li><?php
                          }
                          }
                          $conn->close();

                                      ?>

        </ul>
                         </div>
                    <!-- end mca -->
                </div>
            
                <div class="tab-pane fade" id="viewmessagevotes">

                </div>
            </div>
          </div>
<!-- end create candidate tabs -->

</section>


</div>
</div>
<footer class="main-footer " style=";background-color: #41f467;margin-top:-1.2%; ">
<div class="pull-right hidden-xs">
<b>AMVS@2018</b>
</div>
<strong>Copyright &copy; <?php echo date('Y'); ?> Developed By <a target="_blank" href="http://facebook.com/joshua_ariga">Online Election System</a>.</strong> All rights
reserved.
</footer>


<div class="control-sidebar-bg"></div>
</div>
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
AMVS Message Alert
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
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="okay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="deletereplay" tabindex="-1" role="dialog" aria-labelledby="deletemodallabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="deletemodallabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="deletemsg" style="color:black;">
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close
</button>
<button type="button" class="btn btn-default btn-danger"  id="deleteokay">Okay
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->
<script type="text/javascript">
var currentTime = new Date();
    var curt=currentTime.getHours();
    setInterval(function(){
      $('#loadchairsessionvoting').load('load_chair_session.php?ref='+curt)
    },500);
  $(document).ready(function(){
    
  });
  //edit president
  $('.editpresident').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_president.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletepresident').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete Presidential Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete Presidential Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_president.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
         });
  });

   //edit governor
  $('.editgovernor').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_governor.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletegovernor').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete Gubenatorial Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete Gubenatorial Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_governor.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
         });
  });
      //edit senator
  $('.editsenator').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_senator.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletesenator').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete Senatorial Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete Senatorial Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_senator.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
         });
  });
      //edit womenrep
  $('.editwomenrep').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_womenrep.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletewomenrep').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete WomenRep Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete WomenRep Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_womenrep.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
         });
  });
      //edit mp
  $('.editmp').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_mp.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletemp').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete MP Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete MP Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_mp.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
         });
  });
      //edit mca
  $('.editmca').click(function(){
    $('#myModal').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
    $.ajax({
          url:"load_update_mca.php",
          type:"POST",
        data:{Sno:Sno},
        dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="management.php";
         });

  });
   $('.deletemca').click(function(){
    $('#deletereplay').modal({"backdrop":"static"});
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your Will Delete MCA Candidate "+name);
            $("#deletemodallabel").html(" Delete "+name);
            $('#deleteokay').html("Delete MCA Candidate "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"delete_mca.php",
              type:"POST",
              data:{Sno:Sno},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    

 $('#pressokay').click(function(){
           window.location="management.php";
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
           window.location="management.php";
         });
         });
//end of view chairman profile modal
 function updatechairmanprofile(){
       $.ajax({
          url:"load_update_chairman.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }
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
           //load ward
            $('#constituencycode').change(function(){
      var constituencycode=$('#constituencycode').val();
      //load ward
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
function updatechairmanprofile(){
       $.ajax({
          url:"load_update_chairman.php",
          method:"POST",
          success:function(data){
            $('#msg').html(data);
          }
        });
      }           
</script>
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
