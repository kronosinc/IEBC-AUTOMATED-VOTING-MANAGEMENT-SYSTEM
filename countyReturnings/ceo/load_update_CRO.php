<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_page.css">
<link rel="stylesheet" type="text/css" href="../plugins/datatables/css/demo_table.css">
    <!-- <script type="text/javascript" language="javascript" src="datatables/js/jquery.js"></script> -->
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
    <?php
 include '../db_config/connection.php';
//display Presidings
  $select="select * from countyreturnings  ORDER BY county";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-stripped table-condensed table-responsive" id="example">
    <caption>County Returnings Officer Information</caption><thead><tr>
 <th>ID</th>
                  <th>Username</th>
                  <th>National ID</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Gender</th>
          <th>County</th>
           
           <th>Options</th>
    </tr></thead><tbody>';
    while($row=mysqli_fetch_array($result)){
      $output.='<tr style="background-color: #eee;"><td style="background-color:#eee;">'.$row['id'].'</td>
      <td>'.$row['uname'].'</td>
      <td>'.$row['nid'].'</td>
      <td>'.$row['phone'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['county'].'</td>
      <td><a title="Edit '.$row["uname"].'" class="btn btn-block btn-primary btn-xs editbtn" title="Click here to Edit Presiding '.$row["uname"].'" data-id1="'.$row["id"].'" data-id2="'.$row["uname"].'" ><i class="fa fa-edit">Edit</i></a> 
        <a title="Delete '.$row["uname"].'" class="btn btn-block btn-danger btn-xs" href="delete_presd.php?ref='.$row["id"].'"><i class="fa fa-trash-o">Delete</i></a></td>
      </tr>';
    }
    $output.='</tbody></table>';
    echo $output;
    
  }

    ?>
<!--   <th>Photo</th>
<td> <img width="60px" height="50px" src="data:image;base64,'.$row["photo"].'" /></td>-->
      