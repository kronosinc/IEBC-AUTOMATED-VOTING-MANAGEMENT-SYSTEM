<div class="well pull-left" style="height: 90%;min-height:400px; overflow: auto;">
<?php


//include 'check_login_php';
include '../db_config/connection.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 $myusername = $_SESSION['chairman_username'];
  $current_user = $_SESSION['chairman_fullname'];
 }
 else{
  header("Location:../index.php?login_err=Login First");
 }
 //update president candidate names on ballot papers
 //update polling station ballot papers
      //select all polling stations
      $pollingstations="SELECT * FROM polling order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
           $wardcode=$pollingrecords['wardcode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all president lists
            $sql1 = "SELECT * FROM president ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for president
                       $president=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$president' && polling='$pollingcode' && type='President' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "President ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','President','$president',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "President ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add President ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
      //update ward ballot papers
            //select all wards stations
      $wardstations="SELECT * FROM ward order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $wardcode=$wardrecords['wardcode'];
          //echo $wardcode;
          echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all president lists
            $sql1 = "SELECT * FROM president ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for president
                       $president=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$president' && ward='$wardcode' && type='President' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "President ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','President','$president',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "President ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add President ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
          //update constituency ballot papers
            //select all constituency
      $constituencystations="SELECT * FROM constituency order by Sno";
      $resultconstituency=mysqli_query($conn,$constituencystations);
      $totalconstituencystations=mysqli_num_rows($resultconstituency);
      if ($totalconstituencystations>0) {
        while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
          $constituencycode=$constituencyrecords['constituencycode'];
          //echo $constituencycode;
          echo '<h4>Constituency: '.$constituencyrecords['constituencyname'].'</h4>';
                  //select all president lists
            $sql1 = "SELECT * FROM president ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for president
                       $president=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM constituency_results where contestant='$president' && constituency='$constituencycode' && type='President' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "President ".$row['uname']." is on Ballot Page for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO constituency_results( constituency,type,contestant,votes) VALUES ( '$constituencycode','President','$president',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "President ".$row['uname']." Added to ballot Paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add President ".$row['uname']." to ballot paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
             //update county ballot papers
            //select all county
      $countystations="SELECT * FROM county order by Sno";
      $resultcounty=mysqli_query($conn,$countystations);
      $totalcountystations=mysqli_num_rows($resultcounty);
      if ($totalcountystations>0) {
        while ($countyrecords=mysqli_fetch_array($resultcounty)) {
          $countycode=$countyrecords['countycode'];
          //echo $countycode;
          echo '<h4>County: '.$countyrecords['countyname'].'</h4>';
                  //select all president lists
            $sql1 = "SELECT * FROM president ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for president
                       $president=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM county_results where contestant='$president' && county='$countycode' && type='President' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "President ".$row['uname']." is on Ballot Page for County Station ".$countyrecords['countyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO county_results( county,type,contestant,votes) VALUES ( '$countycode','President','$president',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "President ".$row['uname']." Added to ballot Paper for County Station ".$countyrecords['countyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add President ".$row['uname']." to ballot paper for County Station ".$countyrecords['countyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";

//update governor names on ballot papers
//update county ballot papers
//select all county
      $countystations="SELECT * FROM county order by Sno";
      $resultcounty=mysqli_query($conn,$countystations);
      $totalcountystations=mysqli_num_rows($resultcounty);
      if ($totalcountystations>0) {
        while ($countyrecords=mysqli_fetch_array($resultcounty)) {
          $countycode=$countyrecords['countycode'];
          //echo $countycode;
          echo '<h4>County: '.$countyrecords['countyname'].'</h4>';
                  //select all governor lists
            $sql1 = "SELECT * FROM governor where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for governor
                       $governor=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM county_results where contestant='$governor' && county='$countycode' && type='Governor' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Governor ".$row['uname']." is on Ballot Page for County Station ".$countyrecords['countyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO county_results( county,type,contestant,votes) VALUES ( '$countycode','Governor','$governor',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Governor ".$row['uname']." Added to ballot Paper for County Station ".$countyrecords['countyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Governor ".$row['uname']." to ballot paper for County Station ".$countyrecords['countyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
//update constituency ballot papers
//select all constituency
      $constituencystations="SELECT * FROM constituency order by Sno";
      $resultconstituency=mysqli_query($conn,$constituencystations);
      $totalconstituencystations=mysqli_num_rows($resultconstituency);
      if ($totalconstituencystations>0) {
        while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
          $constituencycode=$constituencyrecords['constituencycode'];
          $countycode=$constituencyrecords['countycode'];
          //echo $constituencycode;
          echo '<h4>Constituency: '.$constituencyrecords['constituencyname'].'</h4>';
                  //select all governor lists
            $sql1 = "SELECT * FROM governor  where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for governor
                       $governor=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM constituency_results where contestant='$governor' && constituency='$constituencycode' && type='Governor' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Governor ".$row['uname']." is on Ballot Page for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO constituency_results( constituency,type,contestant,votes) VALUES ( '$constituencycode','Governor','$governor',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Governor ".$row['uname']." Added to ballot Paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Governor ".$row['uname']." to ballot paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
//update ward ballot papers
//select all wards stations
 $wardstations="SELECT * FROM ward  order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $wardcode=$wardrecords['wardcode'];
          $constituencycode=$wardrecords['constituencycode'];
          $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
          $resultconstituency=mysqli_query($conn,$constituencystations);
          $totalconstituencystations=mysqli_num_rows($resultconstituency);
          if ($totalconstituencystations>0) {
            while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
              $countycode=$constituencyrecords['countycode'];
          //echo $wardcode;
              echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all governor lists
            $sql1 = "SELECT * FROM governor where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for governor
                       $governor=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$governor' && ward='$wardcode' && type='Governor' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Governor ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','Governor','$governor',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Governor ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Governor ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
       echo "<hr>";
//update polling station ballot papers
//select all polling stations
      $pollingstations="SELECT * FROM polling order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
               $wardstations="SELECT * FROM ward where wardcode='$wardcode' order by Sno";
              $resultward=mysqli_query($conn,$wardstations);
              $totalwardstations=mysqli_num_rows($resultward);
              if ($totalwardstations>0) {
                while ($wardrecords=mysqli_fetch_array($resultward)) {
                  $wardcode=$wardrecords['wardcode'];
                  $constituencycode=$wardrecords['constituencycode'];
                  $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
                  $resultconstituency=mysqli_query($conn,$constituencystations);
                  $totalconstituencystations=mysqli_num_rows($resultconstituency);
                  if ($totalconstituencystations>0) {
                    while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
                      $countycode=$constituencyrecords['countycode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all president lists
            $sql1 = "SELECT * FROM governor where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for governor
                       $governor=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$governor' && polling='$pollingcode' && type='Governor' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Governor ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','Governor','$governor',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Governor ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Governor ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
}
}

       echo "<hr>";
     
     
  
//update senator candidate names on ballot papers
 //update polling station ballot papers
      //select all polling stations
      $pollingstations="SELECT * FROM polling order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
             $wardstations="SELECT * FROM ward where wardcode='$wardcode' order by Sno";
              $resultward=mysqli_query($conn,$wardstations);
              $totalwardstations=mysqli_num_rows($resultward);
              if ($totalwardstations>0) {
                while ($wardrecords=mysqli_fetch_array($resultward)) {
                  $wardcode=$wardrecords['wardcode'];
                  $constituencycode=$wardrecords['constituencycode'];
                  $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
                  $resultconstituency=mysqli_query($conn,$constituencystations);
                  $totalconstituencystations=mysqli_num_rows($resultconstituency);
                  if ($totalconstituencystations>0) {
                    while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
                      $countycode=$constituencyrecords['countycode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all senator lists
            $sql1 = "SELECT * FROM senator ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for senator
                       $senator=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$senator' && polling='$pollingcode' && type='Senator' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Senator ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','Senator','$senator',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Senator ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Senator ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
}
}
       echo "<hr>";
//update ward ballot papers
//select all wards stations
      $wardstations="SELECT * FROM ward order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $wardcode=$wardrecords['wardcode'];
          $constituencycode=$wardrecords['constituencycode'];
          $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
          $resultconstituency=mysqli_query($conn,$constituencystations);
          $totalconstituencystations=mysqli_num_rows($resultconstituency);
          if ($totalconstituencystations>0) {
            while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
              $countycode=$constituencyrecords['countycode'];
          //echo $wardcode;
          echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all senator lists
            $sql1 = "SELECT * FROM senator where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for senator
                       $senator=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$senator' && ward='$wardcode' && type='Senator'  ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Senator ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','Senator','$senator',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Senator ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Senator ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
       echo "<hr>";
//update constituency ballot papers
//select all constituency
      $constituencystations="SELECT * FROM constituency order by Sno";
      $resultconstituency=mysqli_query($conn,$constituencystations);
      $totalconstituencystations=mysqli_num_rows($resultconstituency);
      if ($totalconstituencystations>0) {
        while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
          $constituencycode=$constituencyrecords['constituencycode'];
          $countycode=$constituencyrecords['countycode'];
          //echo $constituencycode;
          echo '<h4>Constituency: '.$constituencyrecords['constituencyname'].'</h4>';
                  //select all senator lists
            $sql1 = "SELECT * FROM senator where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for senator
                       $senator=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM constituency_results where contestant='$senator' && constituency='$constituencycode' && type='Senator'  ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Senator ".$row['uname']." is on Ballot Page for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO constituency_results( constituency,type,contestant,votes) VALUES ( '$constituencycode','Senator','$senator',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Senator ".$row['uname']." Added to ballot Paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Senator ".$row['uname']." to ballot paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
             //update county ballot papers
            //select all county
      $countystations="SELECT * FROM county order by Sno";
      $resultcounty=mysqli_query($conn,$countystations);
      $totalcountystations=mysqli_num_rows($resultcounty);
      if ($totalcountystations>0) {
        while ($countyrecords=mysqli_fetch_array($resultcounty)) {
          $countycode=$countyrecords['countycode'];
          //echo $countycode;
          echo '<h4>County: '.$countyrecords['countyname'].'</h4>';
                  //select all senator lists
            $sql1 = "SELECT * FROM senator where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for senator
                       $senator=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM county_results where contestant='$senator' && county='$countycode' && type='Senator'  ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "Senator ".$row['uname']." is on Ballot Page for County Station ".$countyrecords['countyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO county_results( county,type,contestant,votes) VALUES ( '$countycode','Senator','$senator',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "Senator ".$row['uname']." Added to ballot Paper for County Station ".$countyrecords['countyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add Senator ".$row['uname']." to ballot paper for County Station ".$countyrecords['countyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";

      //update womenrep names on ballot papers
       //update polling station ballot papers
      //select all polling stations
      $pollingstations="SELECT * FROM polling order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
            $wardstations="SELECT * FROM ward where wardcode='$wardcode' order by Sno";
              $resultward=mysqli_query($conn,$wardstations);
              $totalwardstations=mysqli_num_rows($resultward);
              if ($totalwardstations>0) {
                while ($wardrecords=mysqli_fetch_array($resultward)) {
                  $wardcode=$wardrecords['wardcode'];
                  $constituencycode=$wardrecords['constituencycode'];
                  $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
                  $resultconstituency=mysqli_query($conn,$constituencystations);
                  $totalconstituencystations=mysqli_num_rows($resultconstituency);
                  if ($totalconstituencystations>0) {
                    while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
                      $countycode=$constituencyrecords['countycode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all womenrep lists
            $sql1 = "SELECT * FROM womenrep ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for womenrep
                       $womenrep=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$womenrep' && polling='$pollingcode' && type='WomenRep'  ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "WomenRep ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','WomenRep','$womenrep',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "WomenRep ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add WomenRep ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
}
}
       echo "<hr>";
      //update ward ballot papers
            //select all wards stations
      $wardstations="SELECT * FROM ward order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $wardcode=$wardrecords['wardcode'];
           $constituencycode=$wardrecords['constituencycode'];
          $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode' order by Sno";
          $resultconstituency=mysqli_query($conn,$constituencystations);
          $totalconstituencystations=mysqli_num_rows($resultconstituency);
          if ($totalconstituencystations>0) {
            while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
              $countycode=$constituencyrecords['countycode'];
          //echo $wardcode;
          echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all womenrep lists
            $sql1 = "SELECT * FROM womenrep where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for womenrep
                       $womenrep=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$womenrep' && ward='$wardcode' && type='WomenRep' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "WomenRep ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','WomenRep','$womenrep',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "WomenRep ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add WomenRep ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
       echo "<hr>";
          //update constituency ballot papers
            //select all constituency
      $constituencystations="SELECT * FROM constituency order by Sno";
      $resultconstituency=mysqli_query($conn,$constituencystations);
      $totalconstituencystations=mysqli_num_rows($resultconstituency);
      if ($totalconstituencystations>0) {
        while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
          $constituencycode=$constituencyrecords['constituencycode'];
          $countycode=$constituencyrecords['countycode'];
          //echo $constituencycode;
          echo '<h4>Constituency: '.$constituencyrecords['constituencyname'].'</h4>';
                  //select all womenrep lists
            $sql1 = "SELECT * FROM womenrep where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for womenrep
                       $womenrep=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM constituency_results where contestant='$womenrep' && constituency='$constituencycode' && type='WomenRep' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "WomenRep ".$row['uname']." is on Ballot Page for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO constituency_results( constituency,type,contestant,votes) VALUES ( '$constituencycode','WomenRep','$womenrep',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "WomenRep ".$row['uname']." Added to ballot Paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add WomenRep ".$row['uname']." to ballot paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
             //update county ballot papers
            //select all county
      $countystations="SELECT * FROM county order by Sno";
      $resultcounty=mysqli_query($conn,$countystations);
      $totalcountystations=mysqli_num_rows($resultcounty);
      if ($totalcountystations>0) {
        while ($countyrecords=mysqli_fetch_array($resultcounty)) {
          $countycode=$countyrecords['countycode'];
          //echo $countycode;
          echo '<h4>County: '.$countyrecords['countyname'].'</h4>';
                  //select all womenrep lists
            $sql1 = "SELECT * FROM womenrep where countycode='$countycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for womenrep
                       $womenrep=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM county_results where contestant='$womenrep' && county='$countycode' && type='WomenRep' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "WomenRep ".$row['uname']." is on Ballot Page for County Station ".$countyrecords['countyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO county_results( county,type,contestant,votes) VALUES ( '$countycode','WomenRep','$womenrep',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "WomenRep ".$row['uname']." Added to ballot Paper for County Station ".$countyrecords['countyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add WomenRep ".$row['uname']." to ballot paper for County Station ".$countyrecords['countyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
//update mp names on ballot papers
//update polling station ballot papers
//select all polling stations
      $pollingstations="SELECT * FROM polling order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
            $wardstations="SELECT * FROM ward where wardcode='$wardcode' order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $constituencycode=$wardrecords['constituencycode'];
            $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode'  order by Sno";
            $resultconstituency=mysqli_query($conn,$constituencystations);
            $totalconstituencystations=mysqli_num_rows($resultconstituency);
            if ($totalconstituencystations>0) {
              while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
                $constituencycode=$constituencyrecords['constituencycode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all mp lists
            $sql1 = "SELECT * FROM mp where constituencycode='$constituencycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for mp
                       $mp=$row['Sno'];
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$mp' && polling='$pollingcode' && type='MP' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "MP ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','MP','$mp',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "MP ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add MP ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
      
    }
  }
}
}
       echo "<hr>";
      //update ward ballot papers
            //select all wards stations
      $wardstations="SELECT * FROM ward order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $constituencycode=$wardrecords['constituencycode'];
            $constituencystations="SELECT * FROM constituency where constituencycode='$constituencycode'  order by Sno";
            $resultconstituency=mysqli_query($conn,$constituencystations);
            $totalconstituencystations=mysqli_num_rows($resultconstituency);
            if ($totalconstituencystations>0) {
              while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
                $constituencycode=$constituencyrecords['constituencycode'];
          //echo $wardcode;
          echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all mp lists
            $sql1 = "SELECT * FROM mp where constituencycode='$constituencycode'  ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for mp
                       $mp=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$mp' && ward='$wardcode' && type='MP' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "MP ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','MP','$mp',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "MP ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add MP ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
      else{
        echo "string".mysqli_error($conn);
      }
    }
  }
       echo "<hr>";
          //update constituency ballot papers
            //select all constituency
      $constituencystations="SELECT * FROM constituency order by Sno";
      $resultconstituency=mysqli_query($conn,$constituencystations);
      $totalconstituencystations=mysqli_num_rows($resultconstituency);
      if ($totalconstituencystations>0) {
        while ($constituencyrecords=mysqli_fetch_array($resultconstituency)) {
          $constituencycode=$constituencyrecords['constituencycode'];
          //echo $constituencycode;
          echo '<h4>Constituency: '.$constituencyrecords['constituencyname'].'</h4>';
                  //select all mp lists
            $sql1 = "SELECT * FROM mp where constituencycode='$constituencycode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for mp
                       $mp=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM constituency_results where contestant='$mp' && constituency='$constituencycode' && type='MP' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "MP ".$row['uname']." is on Ballot Page for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO constituency_results( constituency,type,contestant,votes) VALUES ( '$constituencycode','MP','$mp',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "MP ".$row['uname']." Added to ballot Paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add MP ".$row['uname']." to ballot paper for Constituency Station ".$constituencyrecords['constituencyname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
             //update mca names on ballot papers
       //update polling station ballot papers
      //select all polling stations
$wardstations="SELECT * FROM ward order by Sno";
$resultward=mysqli_query($conn,$wardstations);
$totalwardstations=mysqli_num_rows($resultward);
if ($totalwardstations>0) {
  while ($wardrecords=mysqli_fetch_array($resultward)) {
    $wardcode=$wardrecords['wardcode'];
      $pollingstations="SELECT * FROM polling where wardcode='$wardcode' order by Sno";
      $resultpolling=mysqli_query($conn,$pollingstations);
      $totalpollingstations=mysqli_num_rows($resultpolling);
      if ($totalpollingstations>0) {
        while ($pollingrecords=mysqli_fetch_array($resultpolling)) {
          $pollingcode=$pollingrecords['pollingcode'];
           $wardcode=$pollingrecords['wardcode'];
          //echo $pollingcode;
          echo '<h4>Polling Station: '.$pollingrecords['pollingname'].'</h4>';
                  //select all mca lists
            $sql1 = "SELECT * FROM mca where wardcode='$wardcode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for mca
                       $mca=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM presiding_results where contestant='$mca' && polling='$pollingcode' && type='MCA' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "MCA ".$row['uname']." is on Ballot Page for Polling Station ".$pollingrecords['pollingname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO presiding_results( polling,ward,type,contestant,votes) VALUES ( '$pollingcode','$wardcode','MCA','$mca',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "MCA ".$row['uname']." Added to ballot Paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add MCA ".$row['uname']." to ballot paper for Polling Station ".$pollingrecords['pollingname']."<br>";
                                          }
                                }
               }
             }
        }
      }
    }
  }
       echo "<hr>";
      //update ward ballot papers
            //select all wards stations
      $wardstations="SELECT * FROM ward order by Sno";
      $resultward=mysqli_query($conn,$wardstations);
      $totalwardstations=mysqli_num_rows($resultward);
      if ($totalwardstations>0) {
        while ($wardrecords=mysqli_fetch_array($resultward)) {
          $wardcode=$wardrecords['wardcode'];
          //echo $wardcode;
          echo '<h4>Ward: '.$wardrecords['wardname'].'</h4>';
                  //select all mca lists
            $sql1 = "SELECT * FROM mca where wardcode='$wardcode' ORDER BY Sno";
            $resultvoter=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($resultvoter)>0){
                while($row = mysqli_fetch_array($resultvoter)) {
                      //update votes for mca
                       $mca=$row['Sno'];
                      
                       //first check if name is in repective ballot paper
                        $sql2 = "SELECT * FROM ward_results where contestant='$mca' && ward='$wardcode' && type='MCA' ORDER BY Sno";
                        $presvoter=mysqli_query($conn,$sql2);
                             if(mysqli_num_rows($presvoter)>0){
                                    echo "MCA ".$row['uname']." is on Ballot Page for Ward Station ".$wardrecords['wardname']."<br>";
                                }
                              else{
                                 $result = mysqli_query($conn, "INSERT INTO ward_results( ward,type,contestant,votes) VALUES ( '$wardcode','MCA','$mca',0) ") or die(mysqli_error($conn));
                                      if($result>0)
                                      {
                                       echo "MCA ".$row['uname']." Added to ballot Paper for Ward Station ".$wardrecords['wardname']."<br>";
                                      }
                                      else {
                                         echo "Failed to Add MCA ".$row['uname']." to ballot paper for Ward Station ".$wardrecords['wardname']."<br>";
                                          }
                                }
               }
             }
        }
      }
       echo "<hr>";
 
?>
</div>