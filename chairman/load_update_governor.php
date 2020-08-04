
<!-- retreive governor information -->
  <?php
        include '../db_config/connection.php';
$sno=$_POST['Sno'];
       $sql = "SELECT governor.Sno,governor.photo,governor.uname,governor.nid,governor.partycode,party.partycode,party.partyname from governor,party  where governor.Sno='$sno' && governor.partycode=party.partycode";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $uname = $row['uname'];
         $party = $row['partycode'];
         $partyname = $row['partyname'];
         $nid = $row['nid'];
  echo 
       ' <input type="hidden" name="party" id="party" value="'.$party.'"> <input type="hidden" name="nid" id="nid" value="'.$nid.'"> <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="uname" value="'.$uname.'" id="uname" placeholder="Firstname & Lastname" required>    </div>  <div class="form-group">  <select class="form-control" name="partycode" id="partycode" >  <option>Change Party</option>  <option selected>Change Party</option>   </select>   </div>       <div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upgovernori" id="saveupdategovernor"> Update governor Credentials   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></dv>
        <div > 
         ';

                 }
              } else {
echo "No governor Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

        $sql = "SELECT * FROM governor where Sno='$sno'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$uname.'" title="'.$uname.'"/></center>';

                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updategovernorform" id="updategovernorform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" name="nid" value="'.$nid.'">
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update governor Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdategovernor").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var uname=$('#uname').val();
              var email=$('#email').val();
               var nid=$('#nid').val();
              var partycode=$('#partycode').val();
              var upgovernor="upgovernor";
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
      url:"update_governor.php",
      type:"POST",
      data:{uname:uname,upgovernor:upgovernor,nid:nid,partycode:partycode},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update governor "+uname);
        $("#serverreplay").modal('show');

      }
    });
}
      // sjdfvg
    });
    //update governor photo
    $("#updategovernorform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"update_governor_photo.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update governor Photo Success");
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