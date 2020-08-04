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
    <?php
 include '../db_config/connection.php';
//display counties
  $select="SELECT * FROM constituency  ORDER BY constituencycode";

  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption><b>Constituencies Information</b></caption><thead><tr>
          <th>Sno</th>
          <th>Code</th>
          <th>Name</th>
            <th style="text-align:center;">Options</th>
    </tr></thead><tbody>';
      while($row=mysqli_fetch_array($result)){
      $output.='<tr style="background-color: #eee;"><td style="background-color:#eee;">'.$row['Sno'].'</td>
      <td>'.$row['constituencycode'].'</td>
      <td>'.$row['constituencyname'].'</td>
      <td colspan="3"><a title="Edit '.$row["constituencyname"].'" style="width:49.5%;min-width:150px;" class="btn btn-large btn-primary btn-xs editbtn optionspre" title="Click here to Edit  '.$row["constituencyname"].'" data-id1="'.$row["constituencycode"].'" data-id2="'.$row["constituencyname"].'" onclick="btnc('.$row["constituencycode"].');" ><i class="fa fa-edit">Edit '.$row["constituencyname"].'</i></a> 
        <a title="Delete '.$row["constituencyname"].'" style="width:49.5%;min-width:150px;" data-id1="'.$row["constituencycode"].'" data-id2="'.$row["constituencyname"].'" class="btn btn-large btn-danger btn-xs deletebnt optionspre"><i class="fa fa-trash-o">Delete '.$row["constituencyname"].'</i></a></td>
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
    
     $(document).on('click','.editbtn',function(){

     $('#serverreplay').modal({"backdrop":"static"});
    var ref=$(this).data("id1");
     alert(ref);
    var uname=$(this).data("id2");
     $.ajax({
      url:"update_constituency_det.php",
      type:"POST",
    data:{ref:ref},
    dataType:"text",
      success:function(data){
        $("#closeokay").show();
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Presiding Edit"+uname);
        $("#serverreplay").modal('show');
      }
    });

  });
  

    </script>
<!-- <script type="text/javascript">
  function printme(){
   // window.print();
    $("#myModal").modal('show');
  }
</script> -->
