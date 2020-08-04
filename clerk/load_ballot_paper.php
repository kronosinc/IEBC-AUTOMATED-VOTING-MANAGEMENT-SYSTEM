
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['clerk_username'];
  $current_user = $_SESSION['clerk_currentuser'];
  $pollingstation=$_SESSION['clerk_pollingstation'];
   $clerkid=$_SESSION['clerkid'] ;
  $currentwardlogin=$_SESSION['clerk_currentwardlogin'] ;
  $currentconstituencylogin=$_SESSION['clerk_currentconstituencylogin'];
    $currentcountylogin=$_SESSION['clerk_currentcountylogin'] ;
    $voterpolling= $_SESSION['voterpolling'] ;
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
    include '../db_config/connection.php';
 $sql2 = "SELECT polling.pollingcode,pollingname,ward.wardcode,ward.wardname,constituency.constituencycode,constituency.constituencyname,county.countycode,county.countyname FROM ward,polling,constituency,county where polling.pollingcode='$voterpolling' && polling.wardcode=ward.wardcode && ward.constituencycode=constituency.constituencycode && constituency.countycode=county.countycode ";
            $result2 = $conn->query($sql2) or die(mysqli_error($conn));
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                  $county=$row2['countycode'];
                  $constituency=$row2['constituencycode'];
                  $ward=$row2['wardcode'];
                }
              }

                
if (isset($_POST['president'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">President Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
      
         $counts='';
                   $sql = "SELECT president.Sno,president.uname,president.photo,party.partycode,partyname FROM president ,party where president.partycode=party.partycode  ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votepresidentbtn btn btn-success btn-block" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No President  Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else if (isset($_POST['governor'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">Governor Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
         include '../db_config/connection.php';
         $counts='';
                   $sql = "SELECT  governor.Sno,governor.uname,governor.photo,governor.countycode,party.partycode,partyname FROM governor ,party where governor.partycode=party.partycode && governor.countycode='$county'  ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votegovernorbtn btn btn-success btn-block" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No Governor  Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else if (isset($_POST['senator'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">Senator Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
         include '../db_config/connection.php';
         $counts='';
                   $sql = "SELECT  senator.Sno,senator.uname,senator.photo,senator.countycode,party.partycode,partyname FROM senator ,party where senator.partycode=party.partycode && senator.countycode='$county'  ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votesenatorbtn btn btn-success btn-circle" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No Senator Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else if (isset($_POST['womenrep'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">Women Rep Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
         include '../db_config/connection.php';
         $counts='';
                   $sql = "SELECT  womenrep.Sno,womenrep.uname,womenrep.photo,womenrep.countycode,party.partycode,partyname FROM womenrep ,party where womenrep.partycode=party.partycode && womenrep.countycode='$county'   ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votewomenrepbtn btn btn-success btn-block" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No Women Rep  Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else if (isset($_POST['mp'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">Member of Parliament Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
         include '../db_config/connection.php';
         $counts='';
                   $sql = "SELECT  mp.Sno,mp.uname,mp.photo,mp.constituencycode,party.partycode,partyname FROM mp ,party where mp.partycode=party.partycode && mp.constituencycode='$constituency' ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votempbtn btn btn-success btn-circle" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No Member of Parliament Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else if (isset($_POST['mca'])) {
  echo ' <table class="table table-responsive table-stripped " style="width: 100%;">
                            <thead>
                                  <tr >
                                   <th style="font-size: 15px;">MCA Name</th>
                                     <th style="font-size: 15px;">Photo</th>
                                       <th style="font-size: 15px;">Party</th>
                                        <th style="font-size: 15px;">Vote Here</th>
                                </thead>
                                <tbody >';
           //include 'check_login_agent.php';
         include '../db_config/connection.php';
         $counts='';
                   $sql = "SELECT  mca.Sno,mca.uname,mca.photo,mca.wardcode,party.partycode,partyname FROM mca ,party where mca.partycode=party.partycode  && mca.wardcode='$ward' ";
                      $resultvote=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultvote)>0){
                        while($row =mysqli_fetch_array($resultvote)) {
                           echo '<tr><td style="text-align:center;">' . $row["uname"]. '</td><td style="text-align:center;"> <img width="60px" height="30px" src="../uploads/'.$row['photo'].'" /></td><td style="text-align:center;">'.$row['partyname'].'</td>
                           <td style="text-align:center;"><button class="votemcabtn btn btn-success btn-block" data-id1="'.$row["Sno"].'" data-id2="'.$row["uname"].'">Click to Vote</button></td></tr>';
                                }
                            } 
                            else{
                               echo '<tr><td colspan="3">No MCA Found</td></tr>';
                               
                            }
                     
             $conn->close();
             echo '  </tbody> </table> ' ;
}
else
{
  echo "Please Choose Your Ballot Paper";
}
           ?>
          