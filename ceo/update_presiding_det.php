
<!-- retreive ceo information -->
  <?php
        include '../db_config/connection.php';
if(isset($_POST['ref'])){
  $id=$_POST['ref'];
       $sql = "SELECT * FROM presiding where id='$id'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $email = $row['email'];
         $nid = $row['nid'];
         $phone = $row['phone'];
  echo 
       '  <div ><input type="hidden" id="ids" name="ids" value="'.$id.'"/> <div class="form-group has-feedback">  <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:gray;"></span>      <input type="email" class="form-control" name="email" id="email" value="'.$email.'" placeholder="ceo Email" required>  </div>     <div class="form-group has-feedback">   <span class="glyphicon glyphicon-phone form-control-feedback" style="color:gray;"></span>  <input type="text" class="form-control" name="phone" id="phone" value="'.$phone.'" placeholder="ceo Telphone" maxlength="13" required>   </div><div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="uppresiding" id="saveupdatepresiding"> Update ceo Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></div>
        <div > 
         ';

                 }
              } else {
echo "No ceo Found";
                    }
  
}
else{
  echo "No Presiding Selected ";
}
                       $conn->close();
        ?>
   
<script type="text/javascript">
    $("#saveupdatepresiding").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
             var ids=$('#ids').val();
              var email=$('#email').val();
              var phone=$('#phone').val();
              var uppresiding="uppresiding";
              if(email==""){
                  $('#replaymsg').html("Please Choose Valid Email");
                  $("#servermodallabel").html("Email Error");
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
      url:"save_update_presd.php",
      type:"POST",
      data:{email:email,uppresiding:uppresiding,phone:phone,ids:ids},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update Presiding Success");
        $("#serverreplay").modal('show');

      }
    });
}
    });
  

</script>