<!-- display session -->
      <?php
 include '../db_config/connection.php';
//display Presidings
  $select="select * from votingsession  ORDER BY id";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='
  <div class="panel" style="padding:2px;">
              <span><b>Please specify </b></span>

    <table border="1" class="Duration table table-stripped table-condensed table-responsive">
    <caption style="background-color:darkslategray;color:white;">Start and End Date Session</caption><tr>
    <th>Activity</th>
          <th>Start</th>
          <th>End</th>
          <th>Action</th>
    </tr>'; 
    while($row=mysqli_fetch_array($result)){
      $output.='<tr style="background-color: #eee;">
       <td>'.$row['Activity'].'</td>
      <td>'.$row['StartDate'].'</td>
      <td>'.$row['EndDate'].'</td>
       <td><a title="Edit '.$row["Activity"].'" class="btn btn-block btn-primary btn-xs editbtn" title="Click here to Edit  '.$row["Activity"].'" data-id1="'.$row["id"].'" data-id2="'.$row["Activity"].'" ><i class="fa fa-edit">Edit</i></a> 
        </td>
      </tr>
     ';
    }
    $output.='
    </table> </div>';

    echo $output;
  }
    ?>
    <script type="text/javascript">
      //edit voting session
 $('.editbtn').click(function(){
    $('#serverreplay').modal({"backdrop":"static"});
    var ref=$(this).data("id1");
    var activity=$(this).data("id2");
  $.ajax({
      url:"load_update_voting_session.php",
      type:"POST",
    data:{ref:ref},
    dataType:"text",
      success:function(data){
        $("#closeokay").show();
        $('#replaymsg').html(data);
        $("#servermodallabel").html(" Edit "+activity);
        $("#serverreplay").modal('show');
      }
    });


  });
  $("#okay").click(function(){
    window.location="index.php";
     });

    </script>
      <script type="text/javascript">
    
  

</script>