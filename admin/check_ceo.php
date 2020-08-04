
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMVS | Agent Dashboard</title>
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

<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="padding:10px;">
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-header" style="background-color: blue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel" style="color:red;" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: #ffeade;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Continue
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->

<script type="text/javascript">
  $(document).ready(function(){
    
      <?php

 include '../db_config/connection.php';

$sql = "SELECT * FROM ceo";
$result = $conn->query($sql);
 if ($result->num_rows ==1) {

    ?>
      	 $("#msg").html("CEO Already in The System. Please Customize.");
         $("#confirmresultstransmission").hide();
           $("#myModal").modal('show');
      //window.alert("hi");
       $('#pressokay').click(function(){
         window.location=('view_ceo.php');
     
         
  });
      <?php
} 
$conn->close();


?>
     
});
</script>
<script src="../plugins/jQuery/jquery-2.2.3.min.js" ></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

