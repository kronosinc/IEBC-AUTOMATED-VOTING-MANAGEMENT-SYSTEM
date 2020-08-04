
        <!-- ictprofile photo -->
      <?php
       
        include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['admin_username'];
  $current_user = $_SESSION['admin_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
        $sql = "SELECT * FROM ict_admin where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
                 $gender = $row['gender'];
                 $regid = $row['user_id'];
                 $user_email = $row['email'];
                 $member_sinc = $row['regdate'];
                 $address = $row['address'];
                 echo 
       '  <div ><div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="name" id="name" value="'.$current_user.'" placeholder="Enter your fullname" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-map-marker form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="address" id="address" value="'.$address.'" placeholder="Enter your address" required>
                </div> 
                <div class="form-group">
               
          <div class="form-group has-feedback">
          <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>
                  <input type="email" class="form-control" name="email" id="email" value="'.$user_email.'" placeholder="Enter your email" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>
                  <input type="password" class="form-control" id="password" name="password1"  placeholder="New Password" required>
                </div>
         <div class="form-group has-feedback">
           <span class="glyphicon glyphicon-lock form-control-feedback" style="color:gray;"></span>
                  <input type="password" class="form-control" id="confirm_password" name="password2"  placeholder="confirm new password" required>
                </div>
                 <div class="box-footer clearfix bg-gray">
              <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upadmin" id="saveupdateadmin"> Update Information
                <i class="fa fa-arrow-circle-up"></i></button>
            </div>
                <br></div>

        
         ';

         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }

         }else {
            echo '<img src="data:image;base64,'.$row['avatar'].'" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
            echo '<h3 class="profile-username text-center">'.$current_user.'</h3>

                <li class="list-group-item">
                  <b>Member Since</b> <a class="pull-right">'.$member_sinc.'</a>
                </li>
              </ul>
            ';

                     }
                   } else {
                      echo "no photo found";
                  }
                   echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updateceoform" id="updateceoform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update ICT Admin Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();

        ?>


 
<script type="text/javascript">
    $("#saveupdateadmin").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var name=$('#name').val();
              var email=$('#email').val();
               var address=$('#address').val();
              var phone=$('#phone').val();
              var password=$('#password').val();
              var upadmin="upadmin";
             
              if(name==""){
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
               else if(address==""){
                  $('#replaymsg').html("Please Choose Valid Address");
                  $("#servermodallabel").html("Address Error");
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
      url:"update_admin.php",
      type:"POST",
      data:{email:email,name:name,upadmin:upadmin,address:address,phone:phone,password:password},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update ceo Success");
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update ceo photo
    $("#updateceoform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_profile.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update ict Photo Success");
        $("#serverreplay").modal('show');
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));

</script>