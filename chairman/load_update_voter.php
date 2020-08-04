
<!-- retreive voters information -->
  <?php
        include '../db_config/connection.php';
$nid=$_POST['nid'];
       $sql = "select * from voters where nid='$nid' ORDER BY Sno";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

               while($row = $result->fetch_assoc()) {
                 $firstname = $row['firstname'];
         $middlename = $row['middlename'];
         $lastname = $row['lastname'];
         $nid = $row['nid'];
  echo 
       '  <input type="hidden" name="nid" id="nid" value="'.$nid.'"> <div ><div class="form-group has-feedback">    <input type="text" class="form-control" name="firstname" value="'.$firstname.'" id="firstname" placeholder="Firstname " required>    </div> <div class="form-group has-feedback">    <input type="text" class="form-control" name="middlename" value="'.$middlename.'" id="middlename" placeholder="Middlename" required>    </div>  <div class="form-group has-feedback">    <input type="text" class="form-control" name="lastname" value="'.$lastname.'" id="lastname" placeholder="Lastname" required>    </div>    <div class="box-footer clearfix bg-gray"> <button type="button" class="pull-right btn btn-danger glyphicon glyphicon-send" name="upvotersi" id="saveupdatevoters"> Update voters Information   <i class="fa fa-arrow-circle-up"></i></button>  </div><br></dv>
        <div > 
         ';

                 }
              } else {
echo "No voters Found";
                    }

                       $conn->close();
        ?>
    <?php

        include '../db_config/connection.php';

        $sql = "SELECT * FROM voters where nid='$nid'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                 echo '<center><img src="../uploads/'.$row['photo'].'" width="170px" alt="'.$firstname.'" title="'.$firstname.'"/></center>';
                     }
                   } else {
                    echo "No Photo Found";
                  }
                  echo '<div class="box-footer no-border bg-gray">
            <form action="" method="POST" enctype="multipart/form-data" name="updatevotersform" id="updatevotersform">
      <input type="file" name="f1" accept="image/*" onchange="loadFile(event)" required>   <img id="output" width="100px" height="50px"/><br>
      <input type="hidden" name="nid" value="'.$nid.'">
           <button type="submit" class="btn btn-danger glyphicon glyphicon-send" name="upphoto" id="sendEmail"style="float:right;"> Update voters Photo
                <i class="fa fa-arrow-circle-up"></i></button>
      </form>
            </div></div> ';
                   $conn->close();
       ?>
<script type="text/javascript">
    $("#saveupdatevoters").click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
   
              var firstname=$('#firstname').val();
              var lastname=$('#lastname').val();
              var middlename=$('#middlename').val();
              var nid=$('#nid').val();
              var upvoters="upvoters";
//alert(partycode);
              if(firstname==""){
                  $('#replaymsg').html("Please enter Valid  Name");
                  $("#servermodallabel").html(" Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(middlename==""){
                  $('#replaymsg').html("Please enter Valid Middle Name");
                  $("#servermodallabel").html(" Name Error");
                  $("#serverreplay").modal('show');
                  return false;
              }
              else if(lastname==""){
                  $('#replaymsg').html("Please enter Valid Last Name");
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
      url:"update_voters.php",
      type:"POST",
      data:{firstname:firstname,upvoters:upvoters,nid:nid,middlename:middlename,lastname:lastname},
      dataType:"text",
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update voters "+uname);
        $("#serverreplay").modal('show');
      }
    });
}
      // sjdfvg
    });
    //update voters photo
    $("#updatevotersform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
      $.ajax({
            url:"update_voters_photo.php",
            type:"POST",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            success:function(data){
              $('#replaymsg').html(data);
              $("#servermodallabel").html("AMVS Update voters Photo Success");
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