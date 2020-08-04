

                          
<?php
         //  include 'check_login_agent.php';
         include '../db_config/connection.php';
        session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['returnings_username'];
  $current_constituencyret = $_SESSION['fullname_returnings'];
   $constituencyret_id=$_SESSION['constituencyret_id'] ;
  $current_constituency=$_SESSION['current_constituency'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
//select all wards in that polling
 $sql1 = "SELECT * FROM `constituency` where constituencycode='$current_constituency' ";
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while($row1 = $result1->fetch_assoc()) {
                //echo $row1['wardname']."\t";
                // $wardcode=$row1['wardcode'];
           
                          ?>
                            <div class="well btn pull-left" style="width: 60%;margin-left: 5px;color: black;background-color: #cfd2d6;">
                            <h4 style="margin-top: -1%;" class="badge"><?php echo $row1['constituencyname'];?></h4>
                            <div class="panel">
                   <table class="table table-responsive table-condensed table-bordered" style="width: 100%;">
                <thead>
                      <tr >
                       <th style="font-size: 15px;">Name</th>
                         <th style="font-size: 15px;">Photo</th>
                           <th style="font-size: 15px;">Votes </th>
                    </thead>
                    <tbody >
                <?php
                      
                          //select all presedint from that ward

                        $sql2 = "SELECT * FROM `constituency_results` where constituency='$current_constituency' && type='President'";
                         $result2 = $conn->query($sql2);
                         if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                            $pres=$row2['contestant'];

                               $sql21 = "SELECT * FROM president where Sno='$pres' ORDER BY Sno ";
                                  $resultvote=mysqli_query($conn,$sql21);
                                  if(mysqli_num_rows($resultvote)>0){
                                    while($row21 =mysqli_fetch_array($resultvote)) {
                                       echo '<tr><td>' . $row21["uname"]. '</td><td> <img width="40px" height="30px" src="../uploads/'.$row21['photo'].'" /></td><td>'.$row2['votes'].'</td></tr>';
                                            }
                                        } 
                                        else{
                                           echo '<tr><td colspan="3">President not Found</td></tr>';
                                           
                                        }
                                  }
                                }
                                else{
                                          echo '<tr><td colspan="3">No Vote For Any President in this ward</td></tr>';
                                     }
                                 
                       ?>
                        </tbody>
                     </table> 
                     </div>
                     </div>
                     <?php
                      }
                    }
                    else
                    {
                      echo "No Ward Found";
                    }
             
  $conn->close();
?>
                                         