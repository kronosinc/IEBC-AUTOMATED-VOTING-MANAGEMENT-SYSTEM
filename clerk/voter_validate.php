    
<?php 
 // hvdfef\
 include '../db_config/connection.php';
 session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=$_SESSION['clerk_pollingstation'];
   $clerkid=$_SESSION['clerkid'] ;
  $currentwardlogin=$_SESSION['clerk_currentwardlogin'] ;
  $currentconstituencylogin=$_SESSION['clerk_currentconstituencylogin'];
    $currentcountylogin=$_SESSION['clerk_currentcountylogin'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
      if(isset($_POST["nid"])){
        $nid=$_POST["nid"];
                  $sql1 = "SELECT * FROM voters where  nid='$nid' && polling='$pollingstation' && votestatus='1'";
                     $result1 = $conn->query($sql1);

                        if (mysqli_query($conn,$sql1)) {
                      while($row = $result1->fetch_assoc()) {
                         ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   // $("#startvoting").hide();
                   //    $('#collapsevoting').collapse('show')
                  });
                </script>
                <div class="row">
              <div class="col-lg-3 " style="color:white;width: 100%;">
          <div class="small-box " style="background-color:red;">
            <div class="inner">
              <h4 style="text-align: center;font-size: 30px;" > Voter Validation Error</h4>
                    <button class="btn btn-block btn-danger" style="">National ID Number:<span class="badge"><?php 
                        echo $nid;
                       ?></span> Was Used to Vote. <br></button>
                  <br>
                   <li class="treeview alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;list-style: none;">
          <a href="" style="text-decoration:none;">
            <i class="fa fa-database"></i>
              <button class="btn btn-block btn-primary glyphicon glyphicon-refresh" style="color:yellow;"><strong style="color:black;"> Refresh</strong></button>

          </a>
        </li>
            </div>
            
        </div>
        </div>
            </div>
            <?php
                       }
                        }
}
              // sdcyfehvs

 ?>





   <?php
      include '../db_config/connection.php';
      if(isset($_POST["nid"])){
        $nid=$_POST["nid"];
        $sql = "SELECT * FROM voters where nid='$nid' && polling='$pollingstation' && votestatus='0'";
        $result = $conn->query($sql);
          if ($result->num_rows > 0) {                 
            while($row = $result->fetch_assoc()) {
             
                  ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   // $("#divnid").hide();
                   //    $('#collapsevoting').collapse('show');
                  });
                </script>
                <div class="row" id="startvoting">
              <div class="col-lg-3 " style="color:white;width: 100%;">
          <div class="small-box " style="background-color:#bf8040;">
            <div class="inner">
              <h4 style="text-align: center;font-size: 30px;" > Voter Information</h4>
              <label class="btn" style="width: 100px;border:1px solid #faedca;">County: </label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" > <?php 
                        echo $currentcountylogin;
                       ?></span>
                <label class="btn" style="width: 100px;border:1px solid #faedca;">Constituency: </label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" > <?php 
                        echo $currentconstituencylogin;
                       ?></span><br>   
                <label class="btn" style="width: 100px;border:1px solid #faedca;">Ward: </label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" > <?php 
                        echo $currentwardlogin;
                       ?></span>   
                <label class="btn" style="width: 110px;border:1px solid #faedca;">Polling Station: </label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" > <?php 
                        echo $pollingstation;
                       ?></span><br>                 
               <label class="btn" style="width: 100px;border:1px solid #faedca;">ID No:</label> 
               <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" ><?php 
                        echo $row['nid'];
                       ?></span>
                 <label class="btn" style="width: 100px;border:1px solid #faedca;">Voter Names: </label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" > <?php 
                        echo $row['firstname']." ";
                         echo $row['middlename'];
                      
                       ?></span><br>
                       <label class="btn " style="width: 100px;border:1px solid #faedca;">Passport:</label>
                 <span class="badge" style="text-align: center;padding: 10px;font-size:100%;" ><?php 
                        echo '<img width="100px" height="100px" src="../uploads/'.$row['photo'].'" align="left" style="margin-top:-1.1%;margin-left:10%;"/>';
                      
                       ?></span><br>
                         <a href="voters_page.php?user=<?php  echo $row['nid']; ?>"><button class="btn btn-block btn-primary" style="">Start Voting</button></a>
                 <br>
                 
            </div>
            
        </div>
        </div>
            </div>
                  <?php
                   $_SESSION['loggedin'] = true;
                 $_SESSION['voternid'] = $row['nid'];
                  $_SESSION['voterpolling'] = $row['polling'];
                     }
                        } 
                else{
                  ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                   // $("#divnid").hide();
                   //    $('#collapsevoting').collapse('show')
                  });
                </script>
                <div class="row">
              <div class="col-lg-3 " style="color:white;width: 100%;">
          <div class="small-box " style="background-color:red;">
            <div class="inner">
              <h4 style="text-align: center;font-size: 30px;" > Voter Validation Error</h4>
                    <button class="btn btn-block btn-danger" style="">National ID Number:<span class="badge"><?php 
                        echo $nid;
                       ?></span> Was Not Found. <br></button>
                  <br>
                   <li class="treeview alert alert-info" style="margin-left:4%;margin-right:4%;font-size:15px;list-style: none;">
          <a href="" style="text-decoration:none;">
            <i class="fa fa-database"></i>
              <button class="btn btn-block btn-primary glyphicon glyphicon-refresh" style="color:yellow;"><strong style="color:black;"> Refresh</strong></button>
          </a>
        </li>
            </div>
            
        </div>
        </div>
            </div>
            <?php
                }                   
                 $conn->close();

      }
     
       ?>