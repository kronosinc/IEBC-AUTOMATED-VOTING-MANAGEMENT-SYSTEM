<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_page.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_table.css">
    <script type="text/javascript" language="javascript" src="datatables/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../plugins/datatables/js/jquery.dataTables.js"></script>
    
    <style type="text/css">
      thead tr {
        background-color: grey;
      }
       
    </style>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        var oTable = $('#example').dataTable();
        var oSettings = oTable.fnSettings();
        var iStart = new Date().getTime();
        
        for ( var i=0, iLen=100 ; i<iLen ; i++ )
        {
        console.profile( );
          oTable.fnSort( [[1, 'asc']] );
          oTable.fnSort( [[0, 'asc']] );
        console.profileEnd( );
        }
        
        var iEnd = new Date().getTime();
        document.getElementById('output').innerHTML = "Test took "+(iEnd-iStart)+"mS";
      } );

    </script>
    <!-- Modal -->
<div class="modal fade " id="serverreplay" tabindex="-1" role="dialog" aria-labelledby="servermodallabel" aria-hidden="false" style="height: 120%;">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="servermodallabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="replaymsg" style="color:black;">
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="closeokay">Close
</button>
<button type="button" class="btn btn-default" data-dismiss="modal" id="okay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <?php
 include '../db_config/connection.php';
//display Presidings
  $select="select * from presiding  ORDER BY county";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption>Presiding Officer Information</caption><thead><tr>
          <th>ID</th>
          <th>Username</th>
          <th>National ID</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Gender</th>
           <th>County</th>
           <th>Constituency</th>
           <th>Ward</th>
    </tr></thead><tbody>';
      while($row=mysqli_fetch_array($result)){
      $output.='<tr style="background-color: #eee;"><td style="background-color:#eee;">'.$row['id'].'</td>
      <td>'.$row['uname'].'</td>
      <td>'.$row['nid'].'</td>
      <td>'.$row['phone'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['county'].'</td>
      <td>'.$row['constituency'].'</td>
      <td>'.$row['ward'].'</td>
      </tr>';
    }
    
    $output.='</tbody>


    </table>';
    echo $output;
    
  }

    ?>

   <script type="text/javascript">
$(document).ready(function(){
  //$("#myModal").modal('show');
});
    
  //    $(document).on('click','.editbtn',function(){
  //    $('#serverreplay').modal({"backdrop":"static"});
  //   var ref=$(this).data("id1");
  //   var uname=$(this).data("id2");
  //    $.ajax({
  //     url:"update_presiding_det.php",
  //     type:"POST",
  //   data:{ref:ref},
  //   dataType:"text",
  //     success:function(data){
  //       $("#closeokay").show();
  //       $('#replaymsg').html(data);
  //       $("#servermodallabel").html("AMVS Presiding Edit"+uname);
  //       $("#serverreplay").modal('show');
  //     }
  //   });

  // });
  
 // function update_presd(ref){
 //      $.ajax({
 //      url:"update_presd.php",
 //      type:"POST",
 //    data:{ref:ref},
 //    dataType:"text",
 //      success:function(data){
 //        $("#closeokay").show();
 //        $('#msg').html(data);
 //        $("#myModalLabel").html("AMVS Presiding Edit");
 //        $("#myModal").modal('show');
 //      }
 //    });
 //    }
// }
// function btnc(id11){
//     alert(id11);
//      // update_presd(ref);
//        hie(id11);
//     }
//     function hie(hi){
//       alert(hi);
//       $("#serverreplay").modal('show');
//     }
    </script>
<!-- <script type="text/javascript">
  function printme(){
   // window.print();
    $("#myModal").modal('show');
  }
</script> -->
