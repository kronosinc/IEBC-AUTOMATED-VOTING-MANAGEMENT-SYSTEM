<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 
   <script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
    
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

          // echo $activity;
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
           //  echo $diffperiod;
             //echo $diffperiod;
             // count down to election day
            // $century=mktime(12,0,0,1,1,2001);
             $today=time();
             $difference=$startdatemake-$today;
             $datedifference=$startdatemake-$today;
             //echo $datedifference;
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
           $enddifference=$enddatemake-$today;
            $daysend=floor($enddifference/84600);
            $enddifference-=84600*floor($enddifference/84600);
            $hoursend=floor($enddifference/3600);
            $enddifference-=3600*floor($enddifference/3600);
            $minutesend=floor($enddifference/60);
            $enddifference-=60*floor($enddifference/60);
            $secondsend=$enddifference;

if ($type=="Voting") {
            if((($startdatemake<=$today ) && ($startdateyear==date('Y')) && ($startdatemonth==date('n')) && ($startdateday==date('j'))) && ($today<=$enddatemake)){
                     echo '
                  <div class="box-header bg-gray panel">
                    <i class="fa fa-graduation-cap"></i>

                      <h3 class="box-title glyphicon glyphicon-qrcode"id="h3validatevoter"style="color:green;" ></h3><b> VOTER ID Validation</b>
                      <h3 class="box-title glyphicon glyphicon-qrcode"id="h3validatevoter"style="float:right;color:green;" ></h3><b  style="float:right;"> Voter<h style="color:gray;">_</h> </b>
                  </div>
                  <hr id="hrvalidate">
                  <div class="badge" style="width:100%;">
                    <div class=" col-lg-12 ">
                    <!-- voter validation here -->
                    <div class="form-group" id="divvalidatevoter">
                    <form action="" method="POST" id="votervalidationform" name="votervalidationform">'
                      . '<h3 style="font-size:14px;">Please Input Voter ID To Proceed.</h3><br>'
                      .'<div class="form-group has-feedback col-lg-11" style="margin-left:4%;margin-bottom:4%;">
                          <label>National ID</label>
                        <input type="text" class="form-control" name="nid" id="nid" placeholder="Enter National ID" maxlength="8" minlength="8" required>
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:red;"></span>
                      </div>
                        <button type="button" class=" btn btn-default btn-warning btn-block glyphicon glyphicon-hand-right " name="validatevoter" id="validatevoter"> Proceed To Validate ID
                          <i class="fa fa-arrow-circle-up "></i></button>
                    </form>
                    </div>
                    </div>
                    </div>
                     ';
                    }
                 else if($datedifference>=0 && $diffperiod>=0 ){
                          echo ' <div class="box-body" style="background-color:green;">
                  <h3>Voting Ended .<br> Transmission in Progress</h3>
                    </div>
                     ';
                    }
            else
            {
              echo "No Activity Detected";
            }
          }
           else if ($type=="Registration") 
            {
                 if((($today>=$startdatemake) && ($today<=$enddatemake)) || (($today<=$startdatemake) && ($today<=$enddatemake))) {
                $output.=' <div class="panel" style="height:90%;padding:2px;"> 
                 
                <form action="add_voter.php" method="post" enctype="multipart/form-data">
               <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="middlename" placeholder="Middle Name" >
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-pencil form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="form-group has-feedback">
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" style="color:gray;"></span>
                  <input type="text" class="form-control" name="nid" placeholder="National ID" maxlength="8" minlength="8" required>
                </div>
                <div class="form-group" required>
                          <input type="radio"  name="gender" value="Male" >Male
                          <input type="radio"  name="gender" value="Female" >Female
                        </div>
              <div class="form-group">
                <select class="form-control" name="county" id="countycode" required>
                  <option>Choose County</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="constituency" id="constituencycode" required>
                  <option>Choose County First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="ward" id="wardcode" required>
                    <option>Choose constituency First</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="polling" id="pollingcode" >
                  <option>Choose Ward First</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-picture form-control-feedback" style="color:gray;"></span>
                <input type="file" class="form-control" name="photo" accept="photo/*" onchange="loadFile(event)" required><img id="output" width="100px" height="50px"/><br>
              </div>
           

            <div class="box-footer clearfix"style="background-image: url("../dist/img/purty_wood.png");background-repeat: no-repeat;  background-size: cover;background-position: center;">
              <button type="submit" class="pull-right btn btn-danger glyphicon glyphicon-send " name="addvoter" id="addvoter"> Register Voter
                <i class="fa fa-arrow-circle-up "></i></button>
            </div>

      </form>
    </div> ';
               }
               else {
                 $output.='<div class="panel">
                 <button class="btn btn-success btn-block">'.$activity.'</button>
                    <h3 style="font-size:100%;">No Activity currently</h3>
                  </div> ';
               }
           }
    }
  }
  else{
    echo "No Activity Found";
}
    echo $output;
  
  }
}
?>

          <script type="text/javascript">
             $(document).ready(function(){
      var loadcounty="loadcounty";
      $.ajax({
        url:"../load_county.php",
        method:"POST",
        data:{loadcounty:loadcounty},
        dataType:"text",
        success:function(data){
          $('#countycode').html(data);
        }
      });
    });
 //display on changing value  of county
      $('#countycode').change(function(){
        var countycode=$('#countycode').val();
        //load constituency
        $.ajax({
          url:"../load_constituency.php",
          method:"POST",
          data:{countycode:countycode},
          dataType:"text",
          success:function(data){
            $('#constituencycode').html(data);
          }
        });
      });
      //display on changing value  of constituency
      $('#constituencycode').change(function(){
        var constituencycode=$('#constituencycode').val();
        //../load constituency
        $.ajax({
          url:"../load_ward.php",
          method:"POST",
          data:{constituencycode:constituencycode},
          dataType:"text",
          success:function(data){
            $('#wardcode').html(data);
          }
        });
    });
    //displaypoll
    $('#wardcode').change(function(){
      var wardcode=$('#wardcode').val();
      //../load polling
      $.ajax({
        url:"../load_polling.php",
        method:"POST",
        data:{wardcode:wardcode},
        dataType:"text",
        success:function(data){
          $('#pollingcode').html(data);
        }
      });
  });

 $('#validatevoter').click(function(){
  alert("dfvb");
    var nid=$('#nid').val();
    var validatevoter="validatevoter";
       $.ajax({
        url:"voter_validate.php",
        method:"POST",
        data:{nid:nid,validatevoter:validatevoter},
        dataType:"text",
        success:function(data){
          $('#myViewmsg').html(data);
          $("#myViewModalLabel").html("Voter Verification");
           $("#myViewModal").modal('show');
        }
      });
  });
  $("#votervalidationform").on('submit',(function(e){
      e.preventDefault();
     //   var data=new FormData(this);
      $('#serverreplay').modal({"backdrop":"static"});
     
$.ajax({
      url:"voter_validate.php",
      type:"POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success:function(data){
        $('#replaymsg').html(data);
        $("#servermodallabel").html("AMVS Update ceo Photo Success");
        $("#serverreplay").modal('show');
        $("#serverreplay").modal('show');
      }
    });   
      // sjdfvg
    }));
      
          </script>
           
         
<!-- Modal -->
<div class="modal fade " id="myViewModal" tabindex="-1" role="dialog" aria-labelledby="myViewModalLabel" aria-hidden="false" data-backdrop="false"   ">
<div class="modal-dialog modal-lg " style="">
<div class="modal-content" style="background-color: #eee;" >
<div class="modal-header" style="background-color: cyan;color: white;" >
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myViewModalLabel">
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="myViewmsg" style="">

AMVS Message Alert
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="viewpressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->