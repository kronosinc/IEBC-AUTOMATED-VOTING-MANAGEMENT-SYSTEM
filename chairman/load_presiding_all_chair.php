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
  $select="select * from presiding  ORDER BY id";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-bordered table-condensed table-responsive" id="example">
    <caption>ALL PRESIDING OFFICERS <span class="badge pull-right">'.mysqli_num_rows($result).'</span> </caption><thead><tr>
    <th>SNo</th>
          <th>Name</th>
          <th>NID</th>
          <th>Email</th>
          <th>Gender</th>
           <th>Polling</th>
    </tr></thead><tbody>';
    $count=0;
      while($row=mysqli_fetch_array($result)){
        ++$count;
      $output.='<tr style="background-color: #eee;">
        <td>'.$count.'</td>
      <td>'.$row['uname'].'</td>
      <td>'.$row['nid'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['polling'].'</td>
      </tr>';
    }
    $output.='</tbody>


    </table></div>';
    echo $output;
    
  }

    ?>

   <script type="text/javascript">
$(document).ready(function(){
  //$("#myModal").modal('show');
});
    
 