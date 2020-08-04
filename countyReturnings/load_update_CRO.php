<?php
// include 'check_login_countyret.php';
// include 'count_records.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $email = $_SESSION['countyreturnings_username'];
  $current_countyreturnings = $_SESSION['fullname_countyreturnings'];
   $countyret_id=$_SESSION['countyret_id'] ;
  $current_county=$_SESSION['countyreturnings_current_county'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
?>
<!-- retreive countyreturnings information -->
  <?php
        include '../db_config/connection.php';

       $sql = "SELECT * FROM countyreturnings where email='$email'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $email = $row['email'];
         $nid = $row['nid'];
         $phone = $row['phone'];
  echo 
       '  <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="uname" value="'.$uname.'" id="uname" placeholder="Firstname & Lastname" required>    </div>      <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>    <input type="text" class="form-control" name="nid" id="nid" value="'.$nid.'" placeholder="National ID" maxlength="8" required>   </div>   <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone" id="phone" value="'.$phone.'" placeholder="countyreturnings Telphone" maxlength="13" required>   </div><div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upcountyreturnings" id="saveupdatecountyreturnings"> Update countyreturnings Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></dv>
        <div > 
         ';

                 }
              } else {
echo "No countyreturnings Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

         $sql = "SELECT * FROM countyreturnings where email='$email'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updatecountyreturningsform" id="updatecountyreturningsform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" name="nid" value="'.$nid.'">
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update countyreturnings Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdatecountyreturnings").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var uname=$('#uname').val();
              var email=$('#email').val();
               var nid=$('#nid').val();
              var phone=$('#phone').val();
              var upcountyreturnings="upcountyreturnings";
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid  Name");
                  $("#servermodallabel").html(" Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(email==""){
                  $('#replaymsg').html("Please Choose Valid Email");
                  $("#servermodallabel").html("Email Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(nid==""){
                  $('#replaymsg').html("Please Choose Valid National ID");
                  $("#servermodallabel").html("National ID Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
               else if(phone==""){
                  $('#replaymsg').html("Please Choose Valid Phone Number");
                  $("#servermodallabel").html("Phone Number Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
else{
  $.ajax({
      url:"update_CRO.php",
      type:"POST",
      data:{email:email,uname:uname,upcountyreturnings:upcountyreturnings,nid:nid,phone:phone},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update countyreturnings Success");
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update countyreturnings photo
    $("#updatecountyreturningsform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_CRO_photo.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update countyreturnings Photo Success");
        $("#serverreplay").modal('show');
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

</script>