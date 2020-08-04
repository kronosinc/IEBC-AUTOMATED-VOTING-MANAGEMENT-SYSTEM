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

   <?php
    session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation = $_SESSION['clerk_pollingstation'];
   $pollingname = $_SESSION['clerk_pollingname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
 include '../db_config/connection.php';
//display Presidings
  $select="select * from voters where polling='$pollingstation' ORDER BY Sno";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
    $output.='<table border="1" class=" table table-bordered table-condensed table-responsive" id="example">
    <caption>All Voters in Your Polling Station:('.$pollingname.') <span class="badge">'.mysqli_num_rows($result).'</span></caption><thead><tr>
    <th>SNo</th>
          <th>Name</th>
          <th>Photo</th>
          <th>Gender</th>
    </tr></thead><tbody>';
    $count=0;
      while($row=mysqli_fetch_array($result)){
        ++$count;
      $output.='<tr style="background-color: #eee;">
        <td>'.$count.'</td>
      <td>'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</td>
      <td><img width="30px" height"30px" src="../uploads/'.$row['photo'].'"></td>
      <td>'.$row['gender'].'</td>
      
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
    
 