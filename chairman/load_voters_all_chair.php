<!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_page.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_table.css">
 -->    <!-- <script type="text/javascript" language="javascript" src="datatables/js/jquery.js"></script> -->
   <!--  <script type="text/javascript" language="javascript" src="../plugins/datatables/js/jquery.dataTables.js"></script>
    
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

    </script> -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
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
<h1 align="center" class="border"><br><br><br><br>
<div style="margin:0 auto; text-align:center;">
      Loading...
      <??>
      <br>
      <img src="../dist/img/loading.gif" style="background-color:#eee;">
      <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
<div class="well">

    <?php
 include '../db_config/connection.php';
//display Presidings
  $select="select * from voters  ORDER BY Sno";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption>Voters From ALL COUNTIES <span class="badge pull-right">'.mysqli_num_rows($result).'</span> </caption><thead><tr>
    <th>SNo</th>
          <th>Name</th>
          <th>NID</th>
          <th>Gender</th>
          <th>Polling</th>
          <th>Action</th>
    </tr></thead><tbody>';
    $count=0;
      while($row=mysqli_fetch_array($result)){
        ++$count;
      $output.='<tr style="background-color: #eee;">
        <td>'.$count.'</td>
      <td>'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</td>
      <td>'.$row['nid'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['polling'].'</td>
       <td><button class="btn  btn-info btn-block editvoter" data-id1="'.$row['nid'].'" data-id2="'.$row['firstname']. '">Edit</button></td>
      </tr>';
    }
    $output.='</tbody>


    </table>';
    echo $output;
    
  }

    ?>

  <script type="text/javascript">
    
        //edit voter
  $('.editvoter').click(function(){
    $('#myModal').modal({"backdrop":"static"});

    var nid=$(this).data("id1");
    var name=$(this).data("id2");
    //alert(name);
    $.ajax({
          url:"load_update_voter.php",
          method:"POST",
          data:{nid:nid},
          dataType:"text",
          success:function(data){
         //   $("#closeokay").show();
            $('#msg').html(data);
            $("#myModalLabel").html(" Edit "+name);
            $("#myModal").modal('show');
          }
        });
     $('#pressokay').click(function(){
           window.location="index.php";
         });

  });
    <script type="text/javascript">
$(document).ready(function(){
  //$("#myModal").modal('show');
});
  </script>
 