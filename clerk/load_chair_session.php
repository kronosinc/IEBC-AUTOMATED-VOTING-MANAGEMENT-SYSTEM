<!-- display session -->
      <?php
 include '../db_config/connection.php';

    ?>
        <?php
 include '../db_config/connection.php';
//display Presidings
 date_default_timezone_set('Africa/Nairobi');
 $select="select max(StartDate) as CurrentDate, StartDate,EndDate,Activity,Type from votingsession ORDER BY id";
  $result=mysqli_query($conn,$select);
  if(mysqli_num_rows($result)>0){
    $output='';
      while($row=mysqli_fetch_array($result)){
        $CurrentDate= $row['CurrentDate'];
        //echo $CurrentDate;
          $select1="select * from votingsession where StartDate='$CurrentDate' ORDER BY id";
          $result1=mysqli_query($conn,$select1);
          if(mysqli_num_rows($result1)>0){
            $output='';
              while($row1=mysqli_fetch_array($result1)){
                   $startdate=date_create($row1['StartDate']);
                $enddate=date_create($row1['EndDate']);
                $activity=$row1['Activity'];
                 $type=$row1['Type'];
                 //echo $CurrentDate;
                // echo $type;
            //start of event
                $startdateyear=date_format($startdate,'Y');

                $startdatemonth=date_format($startdate,'n');

                $startdateday=date_format($startdate,'j');


                $startdatehour=date_format($startdate,'H');

                $startdateminute=date_format($startdate,'i');

                $startdatesecond=date_format($startdate,'s');

                 $startdatemake=mktime($startdatehour,$startdateminute,$startdatesecond,$startdatemonth,$startdateday,$startdateyear);

                 //end of event
                 $enddateyear=date_format($enddate,'Y');

                $enddatemonth=date_format($enddate,'n');

                $enddateday=date_format($enddate,'j');


                $enddatehour=date_format($enddate,'H');

                $enddateminute=date_format($enddate,'i');

                $enddatesecond=date_format($enddate,'s');
                
                 $enddatemake=mktime($enddatehour,$enddateminute,$enddatesecond,$enddatemonth,$enddateday,$enddateyear);

               $diffperiod=$enddatemake-$startdatemake;
                 //echo $diffperiod;
                 // count down to election day
                // $century=mktime(12,0,0,1,1,2001);
                 $today=time();
                 $difference=$startdatemake-$today;
                 $datedifference=$startdatemake-$today;
                $daysmake=floor($difference/84600);
                $difference-=84600*floor($difference/84600);
                $hoursmake=floor($difference/3600);
                $difference-=3600*floor($difference/3600);
                $minutesmake=floor($difference/60);
                $difference-=60*floor($difference/60);
                $secondsmake=$difference;

                 // count down to election day
                // $century=mktime(12,0,0,1,1,2001);
               $today=time();
               $diffperiod=$enddatemake-$startdatemake;
               $enddifference=$enddatemake-$today;
                $daysend=floor($enddifference/84600);
                $enddifference-=84600*floor($enddifference/84600);
                $hoursend=floor($enddifference/3600);
                $enddifference-=3600*floor($enddifference/3600);
                $minutesend=floor($enddifference/60);
                $enddifference-=60*floor($enddifference/60);
                $secondsend=$enddifference;
                session_start();
            if ($type=="Voting") {
              $_SESSION['votingsession']="Voting";

               if ((($startdatemake<=$today ) && ($startdateyear==date('Y')) && ($startdatemonth==date('n')) && ($startdateday==date('j'))) && ($today<=$enddatemake)){
                if($daysmake<0){
                    $daysmake=0;
                  }
                $output.='<div class="panel">
              <button class="btn btn-success btn-block">'.$activity.' <br>CountDown To Election Day</button>
              <span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;" class="badge"> '.$daysmake.' </span><span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$hoursmake.' </span><span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$minutesmake.'  </span> <span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$secondsmake.' </span><br>
              <span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default"> Day</span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Hour </span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Min </span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Secs </span>  
              </div> ';
               }
              
               else {
                 $output.='<div class="panel">
                 <button class="btn btn-success btn-block">'.$activity.'</button>
                    <h3 style="font-size:100%;">Voting Session Has Ended</h3>
                  </div> ';
               }
            }
            else if ($type=="Registration") 
            {
                $_SESSION['votingsession']="Registration";
                 if((($today>=$startdatemake) && ($today<=$enddatemake)) || (($today<=$startdatemake) && ($today<=$enddatemake))){
                  if($daysmake<0){
                    $daysmake=0;
                  }
                $output.='<div class="panel">
              <button class="btn btn-success btn-block"  style="font-size:100%;width:90%;" >CountDown To <br>'.$activity.'</button>
              <span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;" class="badge"> '.$daysmake.' </span><span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$hoursmake.' </span><span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$minutesmake.'  </span> <span style="width: 16%;min-width:35px;padding: 10px;margin: 1%;background-color:red" class="badge"> '.$secondsmake.' </span><br>
              <span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default"> Day</span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Hour </span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Min </span><span style="width: 16%;min-width:35px;padding: 5px;margin: 1%;font-size:9px;" class="btn btn-default">Secs </span>  
              </div> ';
               }
              
               else {
                 $output.='<div class="panel">
                 <button class="btn btn-success btn-block">'.$activity.'</button>
                    <h3 style="font-size:100%;">Registration Activity not detected</h3>
                  </div> ';
               }
           }
               else {
                echo "string";
                }
                

              }

            }
            else{
    echo '<div class="panel">
        <h3 style="font-size:90%;">No Activity Found</h3>
        
      </div> ';
  }

}   
    $output.='';
    echo $output;
  }
  else{
    echo '<div class="panel">
        <h3 style="font-size:90%;">No Session Found</h3>
        
      </div> ';
  }
    ?>
 