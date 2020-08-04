
<!-- retreive womenrep information -->
  <?php
        include '../db_config/connection.php';
$sno=$_POST['Sno'];
       $sql = "SELECT womenrep.Sno,womenrep.photo,womenrep.uname,womenrep.nid,womenrep.partycode,party.partycode,party.partyname from womenrep,party  where womenrep.Sno='$sno' && womenrep.partycode=party.partycode";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $party = $row['partycode'];
         $partyname = $row['partyname'];
         $nid = $row['nid'];
  echo 
       ' <input type="hidden" name="party" id="party" value="'.$party.'"> <input type="hidden" name="nid" id="nid" value="'.$nid.'"> <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="uname" value="'.$uname.'" id="uname" placeholder="Firstname & Lastname" required>    </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Change Party</option>  <option selected>Change Party</option>   </select>   </div>       <div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upwomenrep" id="saveupdatewomenrep"> Update womenrep Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></dv>
        <div > 
         ';

                 }
              } else {
echo "No womenrep Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

        $sql = "SELECT * FROM womenrep where Sno='$sno'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updatewomenrepform" id="updatewomenrepform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" name="nid" value="'.$nid.'">
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update womenrep Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdatewomenrep").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var uname=$('#uname').val();
              var email=$('#email').val();
               var nid=$('#nid').val();
              var partycode=$('#partycode').val();
              var upwomenrep="upwomenrep";
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
      url:"update_womenrep.php",
      type:"POST",
      data:{uname:uname,upwomenrep:upwomenrep,nid:nid,partycode:partycode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update womenrep "+uname);
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update womenrep photo
    $("#updatewomenrepform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_womenrep_photo.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update womenrep Photo Success");
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