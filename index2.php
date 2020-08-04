<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS| Auntheticate</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="dist/js/progress.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="dist/img/icon.png">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <style>
  #mainbody
  {
    background-image: url('./dist/img/boxed-bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
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

<body class="" id="mainbody">

  <div class="login-box" style="background-image: url('./dist/img/Login.jpg');">
    <div class="login-logo"style="background-image: url('./dist/img/boxed-bg.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;margin-top:5.5%;margin-top:-20%;"><img style="height:70px;width:100px;align:center;margin-top:10%;"src="dist/img/joshualogo.png" alt="missing"/> </div>
    <div class="login-logo" style="background-color: ">
      <a href="./"><b style="font-size:28px;color:#00ff50;">Administrator Login</b></a>

    </div>

    <?php
    if(isset($_GET['login_err'])) {
    	$error = $_GET['login_err'];
    	print '<center><b style="color:red;">';
    	echo"$error";
    	print '</b></center>';
    }
    ?>

 
  <div class="login-box-body"style="background-color:#332200;">
    <p class="login-box-msg"><h style="color:white;">Please Auntheticate to start your session</h></p>

    <form action="build/login2.php" method="post" onsubmit="checkload">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Enter Your Email" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row ">
        <div class="col-xs-8 ">

        </div>
        <div class="col-xs-5"style="float:right;">
          <button type="submit" name="submit" id="add" onclick="clickme()" class="btn btn-primary btn-block btn-flat glyphicon glyphicon-log-in"style="color:blue;"><h style="font-size:14px;color:white;"> Sign In</h></button>
        </div>
      </div>
    </form>

    <a href="index.php"><b>BACK TO HOME PAGE</b></a><br>


  </div>
  <div class class= "progress-bar"></div>


  </div>
  <script>
  function clickme() {
  var div =$("<div class='progress-bar'></div>");
  $("body").append(div);
  $('.progress-bar').animate({
    width: '100%'
  },
  {
  duration: 5000
  }
  );
  }
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
</script>
</body>
</html>
