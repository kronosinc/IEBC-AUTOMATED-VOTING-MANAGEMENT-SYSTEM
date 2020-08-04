

<div class="table-responsive">
                           
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
 $sql1 = "SELECT * FROM `ward` where constituencycode='$current_constituency' group by  wardcode";
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while($row1 = $result1->fetch_assoc()) {
                //echo $row1['wardname']."\t";
                $wardcode=$row1['wardcode'];
           
                          ?>
                            <div class="well btn pull-left" style="width: 32%;margin-left: 5px;color: black;min-width: 250px;">
                            <h4><?php echo $row1['wardname'];?></h4>
                            <div class="panel">
                   <table class="table table-responsive table-condensed" style="width: 100%;">
               
                <?php
                       $sql4 = "SELECT * FROM `polling` where wardcode='$wardcode' group by  pollingcode";
                     $result4 = $conn->query($sql4);
                     if ($result4->num_rows > 0) {
                      while($row4 = $result4->fetch_assoc()) {
                       //echo $row4['pollingname']."\t";
                        $pollingcodes=$row4['pollingcode'];
                       
                        echo ' <thead>
                        <tr><td colspan="3"> <h4>'.$row4['pollingname'].'</h4></td> </tr>
                      <tr >
                       <th style="font-size: 15px;">Name</th>
                         <th style="font-size: 15px;">Photo</th>
                           <th style="font-size: 15px;">Votes </th>
                    </thead>
                    <tbody >';
                     //echo ' <h4>'.$row4['pollingname'].'</h4>';
                             $sql2 = "SELECT * FROM `presiding_results` where polling='$pollingcodes' && type='President' ";
                         $result2 = $conn->query($sql2);
                         if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                            $pres=$row2['contestant'];

                               $sql21 = "SELECT * FROM president where Sno='$pres' ORDER BY Sno ";
                                  $resultvote=mysqli_query($conn,$sql21);
                                  if(mysqli_num_rows($resultvote)>0){
                                    while($row21 =mysqli_fetch_array($resultvote)) {
                                      //echo $row2['polling'];
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

                      }
                    }
                          //select all presedint from that ward

                       
                                 
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
          