

                          
<?php
         //  include 'check_login_agent.php';
         include '../db_config/connection.php';
     

                          ?>
                            <div class="well btn pull-left" style="width: 100%;margin-left: 1px;margin-top: 5px;color: black;min-width: 250px;background-color: #cfd2d6;">
                            <div class="panel">
                   <table class="table table-responsive table-condensed table-bordered" style="width: 100%;text-align: left;">
                <thead>
                      <tr >
                       <th style="font-size: 15px;">Candidate Name</th>
                         <th style="font-size: 15px;">Photo</th>
                           <th style="font-size: 15px;">Votes </th>
                    </thead>
                    <tbody >
                <?php
                      
                          //select all presedint 

                        $sql2 = "select sum(county_results.votes) as total, county_results.type,county_results.contestant,president.Sno,president.photo,president.uname from county_results,president where type='President' && president.Sno=county_results.contestant group by contestant";
                         $result2 = $conn->query($sql2);
                         if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                                       echo '<tr style="background-color:#eee;"><td>' . $row2["uname"]. '</td><td> <img width="40px" height="30px" src="../uploads/'.$row2['photo'].'" /></td><td>'.$row2['total'].'</td></tr>';
                                            }
                                        } 
                                        else{
                                           echo '<tr><td colspan="3">President not Found</td></tr>';
                                           
                                        }
                                  
                       ?>
                        </tbody>
                     </table> 
                     </div>
                     </div>
                     <?php
                     
             
  $conn->close();
?>
                                         