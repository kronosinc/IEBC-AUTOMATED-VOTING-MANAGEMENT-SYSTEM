<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS| Auntheticate</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="dist/img/icon.png">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <script type="text/javascript" src="jquery/processing.js"></script>

   <style>
  #mainbody
  {
    background-color: #aaf7aa;
    background-repeat: repeat;
    background-size: cover;
    background-position: center;
  }
  .joshua
  {
    float: right;
  }
  .progress-bar {
    height: 20px;
    background: green;
    width: 0px;
    text-align: center;
    border: 2px solid white;
    margin-top: -4%;
  }

  </style>

</head>

<body  class="" id="mainbody" style="">

<div class="container" style="width:100%;background-repeat: repeat;">
  

<div class="login-box well" style="background-image: url('./dist/img/small-iebc.jpg');margin-top:5%; background-repeat: no-repeat;background-size: 100%;width: 30%;min-width: 300px;opacity: 0.98;background-color: #52d852;">
  <div class="login-logo" style="background-color: ;margin-bottom: 30%;">
   <h4 valign="center" style="font-size:30px;color:red;text-align: center;margin: 10%;"><b>AMVS Standard Login</b></h4>

  </div> 



<?php
if(isset($_GET['message'])) {
	$error = $_GET['message'];
	print '<center><b style="color:green;">';
	echo"$error";
	print '</b></center>';
}
?>
  <div class="login-box-body" style="background-color:transparent;">
  <?php
if(isset($_GET['login_err'])) {
  $error = $_GET['login_err'];
  print '<center><b style="color:red;font-size:20px;">';
  echo "Error :$error";
  print '</b></center>';
}
?>
    <p class="login-box-msg"><h style="color:blue;"><b>Please Auntheticate to start your session</b></h></p>
<div class="well">
    <form action="build/login.php" method="post">

      <div class="form-group has-feedback">
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email or registration ID" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <img style="display:none;margin-left:145px;" id="loading" src="images/3.gif"/>
      <!-- loading image -->
      <div class="row">
        <div class="col-xs-8">

        </div>
        <div class="pull-right" >
          <button type="submit" name="submit" id="add" onclick="clickme()" class="btn btn-primary btn-block btn-flat glyphicon glyphicon-log-in" style="color:blue;"><h style="font-size:14px;color:white;"> Sign In</h></button>
        </div>
        <button type="button" name="submit" id="resetpassword"  class="btn btn-warning btn-large btn-flat" style="color:blue;"><b>I forgot my password</b></button><br>
<!-- <a href="forgot_password"> <button type="button" name="submit" id="add" onclick="clickme()" class="btn btn-warning btn-large btn-flat" style="color:blue;"><b>I forgot my password</b></button></a><br> -->
      </div>
    </form>
</div>
    


  </div>


  <div class class= "progress-bar"></div>


</div>
</div>
<!-- Modal -->
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" style="" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;">
<div class="modal-header" style="background-color: lightsteelblue">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x
</button>
<h4 class="modal-title" id="resetModalLabel">
AMVS Message Information

</h4>
</div>
<div class="modal-body" id="resetmsg">

    <div class="well" style="width: 100%;min-width: 250px;margin-top: 10%;margin-left: 0;">
<center>
    
      <form  method="post" action="" name="resetpasswordform" id="resetpasswordform" role="form" class="form-horizontal" >
      <h4>To reset your Password , Enter the following Information</h4>
      <h3>A Reset Password will be provided. Enter it Using Your email address</h3>
        <div class="form-group has-feedback">
          <label for="user_id" class="col-sm-3 control-label">User Name</label>
            <div class="col-sm-9"> 
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email or Username" required="">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
           </div> 
        </div>
        <div class="form-group has-feedback">
          <label for="user_pass" class="col-sm-3 control-label">ID NO</label>
            <div class="col-sm-9"> 
              <input type="password" class="form-control" name="idno" id="idno" placeholder="Enter ID NO" maxlength="8" minlength="8" required="">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
           </div> 
        </div>
        <div class="form-group"> 
          <div class=" "> 
            <button type="submit" class="pull-right btn btn-large btn-warning" name="resetbtn" id="resetbtn">Reset Password</button><br>
          </div> 
        </div>
    
      </form>
      </center>
 </div>
</div>

<div class="modal-footer"  style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal">Close
</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
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
    <img src="dist/img/loading.gif" >
    <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
// function clickme() {
//   var div =$("<div class='progress-bar'></div>");
//   $("body").append(div);
//   $('.progress-bar').animate({
//     width: '100%'
//   },
// {
//   duration: 5000
// }
// );
// }
</script>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  //reset password here
$('#resetpassword').click(function(){
    $('#resetModal').modal({"backdrop":"static"});
    $("#resetModal").modal('show');
});
$("#resetpasswordform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
       $('#myModal').modal({"backdrop":"static"});
     $.ajax({
              url:"build/reset.php",
              type:"POST",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
               success:function(data){
                    $("#msg").html(data);
                    $("#myModalLabel").html("Forgot Pasword:<br>Password Reset");
                    $("#myModal").modal('show');

                }
            });  
    }));
   $('#okay').click(function(){
      loadparty();
   });
</script>
</body>
</html>
