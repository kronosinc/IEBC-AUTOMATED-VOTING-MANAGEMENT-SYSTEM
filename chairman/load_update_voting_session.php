
<!-- retreive ceo information -->
  <?php
        include '../db_config/connection.php';
if(isset($_POST['ref'])){
  $id=$_POST['ref'];
       $sql = "SELECT * FROM votingsession where id='$id'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
               //  $uname = $row['uname'];
         $StartDate = $row['StartDate'];
         $EndDate = $row['EndDate'];
         $Activity = $row['Activity'];
  echo 
       ' <h2>Edit Election Date</h2><div class="panel"><form role="form" class="form-horizontal"><input type="hidden" id="ids" name="ids" value="'.$id.'"/><div class="form-group has-feedback"> <label class="col-sm-4 control-label">Start Date:</label><div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="datetime" class="form-control" name="startdatevoting" value="'.$StartDate.'"  placeholder="dd/mm/yy" id="startdatevoting"  required></div> </div>  <div class="form-group has-feedback"><label class="col-sm-4 control-label">End Date :</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="datetime" class="form-control" name="enddatevoting" value="'.$EndDate.'" placeholder="dd/mm/yy" id="enddatevoting"  required> </div></div> <div class="form-group has-feedback"><label class="col-sm-4 control-label">Activity:</label> <div class="col-sm-8"> <span class="glyphicon glyphicon-edit form-control-feedback" style="color:gray;"></span> <input type="text" class="form-control" name="activityvoting"  value="'.$Activity.'" placeholder="Enter Activity Name" id="activityvoting"  required> </div></div><button type="button" class="pull-left btn btn-danger deletesession" name="deletesession" id="deletesession"  title="Click here to Delete Session '.$row["Activity"].'" data-id1="'.$row["id"].'" data-id2="'.$row["Activity"].'">Delete Session  <i class="fa fa-arrow-circle-up"></i></button>   <button type="button" class="pull-right btn btn-success glyphicon glyphicon-send" name="editvotingdate" id="editvotingdate">Update  Election Date and Time  <i class="fa fa-arrow-circle-up"></i></button>  </form></div><br>
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
    $("#editvotingdate").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
             var ids=$('#ids').val();
              var startdatevoting=$('#startdatevoting').val();
              var enddatevoting=$('#enddatevoting').val();
              var activityvoting=$('#activityvoting').val();
           //   alert(activityvoting);
  $.ajax({
      url:"save_update_voting_session.php",
      type:"POST",
      data:{startdatevoting:startdatevoting,enddatevoting:enddatevoting,activityvoting:activityvoting,ids:ids},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update Voting Session Success");
        $("#serverreplay").modal('show');

      }
    });
// }
    });
   $(".deletesession").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
         var id=$(this).data("id1");
         var deletesession="deletesession";
  $.ajax({
      url:"delete_update_voting_session.php",
      type:"POST",
      data:{id:id,deletesession:deletesession},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Delete Voting Session Success");
        $("#serverreplay").modal('show');
       // window.location="index.php";
      }
    });
// }
    });
  

</script>
