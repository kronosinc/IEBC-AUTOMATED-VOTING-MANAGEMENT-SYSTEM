

<div class="table-responsive">
                            <table class="table table-responsive table-responsive table-bordered " style="width: 100%;text-align: left;">
                            <thead>
                                  <tr ><th>Sno</th>
                                   <th style="font-size: 15px;">MCA Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Votes Attained</th>

                                </thead>
                                <tbody >
<?php
           // include 'check_login_agent.php';
         include '../db_config/connection.php';
      session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['presiding_username'];
  $current_presiding = $_SESSION['presiding_fullname'];
   //$clerkid=$_SESSION['clerkid'] ;
  $currentpolling=$_SESSION['presiding_currentpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
         $counts=1;
         $sql1 = "SELECT * FROM `presiding_results` where polling='$currentpolling'  && type='MCA'";
             $result1 = $conn->query($sql1);
             if ($result1->num_rows > 0) {
              while($row1 = $result1->fetch_assoc()) {
                $pres=$row1['contestant'];
                   $sql21 = "SELECT * FROM mca where Sno='$pres' ORDER BY Sno ";
                      $resultvote=mysqli_query($conn,$sql21);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row21 =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td>'.$counts.'</td><td>' . $row21["uname"]. '</td><td> <img width="40px" height="30px" src="../uploads/'.$row21['photo'].'" /></td><td>'.$row1['votes'].'</td></tr>';
                           $counts++;
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">Member of county assemble not Found</td></tr>';
                               
                            }
                      }
                    }
                    else{
                              echo '<tr><td colspan="3">No Vote For Any Member ofcounty assemble</td></tr>';
                         }
                     
             $conn->close();
           ?>
            </tbody>
         </table> 