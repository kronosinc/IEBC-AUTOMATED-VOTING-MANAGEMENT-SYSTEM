
<!-- retreive chairman information -->
  <?php
        include '../db_config/connection.php';

       $sql = "SELECT * FROM chairman";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $email = $row['email'];
         $nid = $row['nid'];
         $phone = $row['phone'];
  echo 
       '  <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="uname" value="'.$uname.'" id="uname" placeholder="Firstname & Lastname" required>    </div> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>      <input type="email" class="form-control" name="email" id="email" value="'.$email.'" placeholder="Chairman Email" required>  </div>     <div class="form-group has-feedback">  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>    <input type="text" class="form-control" name="nid" id="nid" value="'.$nid.'" placeholder="National ID" maxlength="8" required>   </div>   <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone" id="phone" value="'.$phone.'" placeholder="Chairman Telphone" maxlength="13" required>   </div><div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upchairman" id="saveupdatechairman"> Update Chairman Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></div>
        <div > 
         ';

                 }
              } else {
echo "No Chairman Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

        $sql = "SELECT * FROM chairman ";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updatechairmanform" id="updatechairmanform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" value="'.$nid.'" name="idno" >
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update Chairman Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdatechairman").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var uname=$('#uname').val();
              var email=$('#email').val();
               var nid=$('#nid').val();
              var phone=$('#phone').val();
              var upchairman="upchairman";
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
      url:"update_chairman.php",
      type:"POST",
      data:{email:email,uname:uname,upchairman:upchairman,nid:nid,phone:phone},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update Chairman Success");
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update chairman photo
    $("#updatechairmanform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_chairman_photo.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update Chairman Photo Success");
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

</script>