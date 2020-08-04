
<!-- retreive president information -->
  <?php
        include '../db_config/connection.php';
$sno=$_POST['Sno'];
       $sql = "SELECT president.Sno,president.photo,president.uname,president.nid,president.partycode,party.partycode,party.partyname from president,party  where president.Sno='$sno' && president.partycode=party.partycode";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $party = $row['partycode'];
         $partyname = $row['partyname'];
         $nid = $row['nid'];
  echo 
       ' <input type="hidden" name="party" id="party" value="'.$party.'"> <input type="hidden" name="nid" id="nid" value="'.$nid.'"> <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="uname" value="'.$uname.'" id="uname" placeholder="Firstname & Lastname" required>    </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Change Party</option>  <option selected>Change Party</option>   </select>   </div>       <div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="uppresident" id="saveupdatepresident"> Update president Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></dv>
        <div > 
         ';

                 }
              } else {
echo "No president Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

        $sql = "SELECT * FROM president where Sno='$sno'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updatepresidentform" id="updatepresidentform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" name="nid" value="'.$nid.'">
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update president Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdatepresident").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var uname=$('#uname').val();
              var email=$('#email').val();
               var nid=$('#nid').val();
              var partycode=$('#partycode').val();
              var uppresident="uppresident";
//alert(partycode);
              if(uname==""){
                  $('#replaymsg').html("Please enter Valid  Name");
                  $("#servermodallabel").html(" Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              
               else if(nid==""){
                  $('#replaymsg').html("Please Choose Valid National ID");
                  $("#servermodallabel").html("National ID Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              
else{
  $.ajax({
      url:"update_president.php",
      type:"POST",
      data:{uname:uname,uppresident:uppresident,nid:nid,partycode:partycode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update president "+uname);
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update president photo
    $("#updatepresidentform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_president_photo.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update President Photo Success");
        $("#serverreplay").modal('show');
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));
    var party=$('#party').val();
        $.ajax({
    url:"load_party.php",
    method:"POST",
    data:{party:party},
    dataType:"text",
    success:function(data){
      $('#partycode').html(data);
    }
  }); 
</script>