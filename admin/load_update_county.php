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
<h1 align="center" class="border"><br><br><br><br>
    <div style="margin:0 auto; text-align:center;">
    Loading...
    <??>
    <br>
    <img src="../dist/img/loading.gif" >
    <br></div></h1>
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
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
Avms
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="deletereplay" tabindex="-1" role="dialog" aria-labelledby="deletemodallabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="deletemodallabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="deletemsg" style="color:black;">
AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" >Close
</button>
<button type="button" class="btn btn-default btn-danger"  id="deleteokay">Okay
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <?php
 include '../db_config/connection.php';
//display counties
  $select="SELECT * FROM county  ORDER BY countycode";

  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption><b>Counties Information</b></caption><thead><tr>
          <th>Sno</th>
          <th>Code</th>
          <th>Name</th>
            <th style="text-align:center;">Options</th>
    </tr></thead><tbody>';
      while($row=mysqli_fetch_array($result)){
      $output.='<tr style="background-color: #eee;"><td style="background-color:#eee;">'.$row['Sno'].'</td>
      <td>'.$row['countycode'].'</td>
      <td title="Edit enter and Click anywhere to save changes '.$row["countyname"].'" data-id1="'.$row["countycode"].'" data-id2="'.$row["countyname"].'" contenteditable class="countyname">'.$row['countyname'].'</td>
      <td colspan="3"><a title="Edit '.$row["countyname"].'" style="width:49.3%;min-width:100px;" class="btn btn-large btn-primary btn-xs editbtn optionspre" title="Click here to Edit  '.$row["countyname"].'" data-id1="'.$row["countycode"].'" data-id2="'.$row["countyname"].'" onclick="btnc('.$row["countycode"].');" ><i class="fa fa-edit">Edit</i></a> 
        <a title="Delete '.$row["countyname"].'" style="width:49.3%;min-width:100px;" class="btn btn-large btn-danger btn-xs optionspre"><i class="fa fa-trash-o" >Delete</i></a></td>
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
    
$(document).on('blur','.countyname',function(){
    var Sno=$(this).data("id1");
    var name=$(this).data("id2");
            $('#deletemsg').html("Your will Update this County "+name);
            $("#deletemodallabel").html(" Edit "+name);
            $('#deleteokay').html("Edit County "+name);
            $("#deletereplay").modal('show');
      $('#deleteokay').click(function(){
           $.ajax({
              url:"update_county.php",
              method:"POST",
              data:{Sno:Sno,name:name},
              dataType:"text",
              success:function(data){
             //   $("#closeokay").show();
              $("#deletereplay").modal('hide');
                $('#msg').html(data);
                $("#myModalLabel").html(" Edit "+name);
                $("#myModal").modal('show');
              }
            });
         });
    
  });
    </script>
<!-- <script type="text/javascript">
  function printme(){
   // window.print();
    $("#myModal").modal('show');
  }
</script> -->
