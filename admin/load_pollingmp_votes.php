

<div class="table-responsive">
                           
<?php
         //  include 'check_login_agent.php';
         include '../db_config/connection.php';
        session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['username'];
  $current_constituencyret = $_SESSION['fullname_returnings'];
   $constituencyret_id=$_SESSION['constituencyret_id'] ;
  $current_constituency=$_SESSION['current_constituency'] ;
  //echo $current_constituency;
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
                //select all pollongstation in that ward
                 $sql2 = "SELECT * FROM `polling` where wardcode='$wardcode' group by  pollingcode";
                     $result2 = $conn->query($sql2);
                     if ($result2->num_rows > 0) {
                      while($row2 = $result2->fetch_assoc()) {
                       //echo $row2['pollingname']."\t";
                        $pollingcode=$row2['pollingcode'];
                          ?>
                            <div class="well btn-warning">
                            <h4><?php echo $row2['pollingname'];?></h4>
                   <table class="table table-responsive table-condensed " style="width: 100%;">
                <thead>
                      <tr >
                       <th style="font-size: 15px;">Name</th>
                         <th style="font-size: 15px;">Photo</th>
                           <th style="font-size: 15px;">Votes </th>
                    </thead>
                    <tbody >
                <?php
                      
                          //select all presedint from that polling

                        $sql1 = "SELECT * FROM `mp_votes` where polling='$pollingcode' group by  mp";
                         $result1 = $conn->query($sql1);
                         if ($result1->num_rows > 0) {
                          while($row1 = $result1->fetch_assoc()) {
                            $pres=$row1['mp'];

                               $sql21 = "SELECT * FROM mp where Sno='$pres' ORDER BY Sno ";
                                  $resultvote=mysqli_query($conn,$sql21);
                                  if(mysqli_num_rows($resultvote)>0){
                                    while($row21 =mysqli_fetch_array($resultvote)) {
                                       echo '<tr><td>' . $row21["uname"]. '</td><td> <img width="40px" height="30px" src="data:image;base64,'.$row21["photo"].'" /></td><td>'.$row1['votes'].'</td></tr>';
                                            }
                                        } 
                                        else{
                                           echo '<tr><td colspan="3">MP not Found</td></tr>';
                                           
                                        }
                                  }
                                }
                                else{
                                          echo '<tr><td colspan="3">No Vote For Any MP</td></tr>';
                                     }
                                 
                       
                       ?>
                        </tbody>
                     </table> 
                     </div>
                     <?php
                      }
                    }
              }
            }
  $conn->close();
?>
          