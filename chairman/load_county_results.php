<div class="box-header" style="background-image: url('../dist/img/boxed-bg.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:0.9;margin: -1%;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-info-sign" style="color:green;"></h3><b>National Tallying Center Results Information</b>
              <h3 class="box-title glyphicon glyphicon-info-sign" style="float:right;color:green;"></h3><b  style="float:right;"> Info<h style="color:gray;">_</h> </b>

            </div>



   <!-- lkkjuu -->
            <div class=" pull-left notifications well" style="width: 100%;margin-top: -0.8%;">
                    <ul id="myTab" class="nav nav-tabs" style="background-color: #1f3f24;">
                       <li class="active"><a href="#viewpresidentvotes" data-toggle="tab">Final</a></li>
                        <li><a href="#viewgovernorvotes" data-toggle="tab">County</a></li>
                        <div class="pull-right" >
                        <button class="badge bg-green" style="margin-top:14%;"><h style="color: yellow;margin-top:6%;"><b> Bomas </b></h></button>
                     
                    </div>
                 </ul>
            <div id="myTabContent" class="tab-content" style="margin-top: 1%;">
          
                <div class="tab-pane fade in active" id="viewpresidentvotes" style="margin-top: -9%;">
                <!-- presidential results panel -->
                 <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 2px;padding: 1px;">
                  <div class="panel" style="background-color: #cfd2d6;">
                  <div class="pull-left" >
                        <button class="badge bg-green" style="margin-top:8%;"><h style="color: yellow;margin-top:6%;"><b> Bomas </b></h></button>
                     
                    </div>
                    <h5 style="text-align: center;font-size: 14px;" >All Counties Presidential Results  <h class="pull-right" style="margin-top: -0.5%;padding-right: 2px;"> <div class="pull-right" >
                       <a href="printpresident34C.php" target="_blank" class="" style="font-size: 10px;margin: 0px;" ><button class="btn btn-large btn-info printpresident box-title glyphicon glyphicon-print" style="margin: 0px;margin-top:-17%;background-color: #4bed66;"><h style="color: white;"><b> Print Form 34C</b></h></button> </a>
                     
                    </div></h></h5>

                          <div class="presidentialallresults" id="presidentialallresults" >
                              No Voting Activity Detected
                          </div>
                 </div>
             
                </div>
                  <!-- end of presidential results  -->
                    
                </div>
                <div class="tab-pane fade" id="viewgovernorvotes">
                 <!-- governor results panel -->
                <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel pull-left" style="width: 100%;min-width: 300px;background-color: #cfd2d6;"">
                       <h5 style="font-size: 14px;" >County Presidentail Results</h5>
                       <div class="form-group has-feedback">
                        <label class="col-sm-3 control-label">County Name: </label>
                            <div class="col-sm-9">
                            <select class="form-control select" name="county" id="county" required>
                                <option>Select County</option>
                            </select>
                         </div>
                     </div> 
                      <div class="presidentialcountyresults" id="presidentialcountyresults">
                                  No Voting Activity Detected
                              </div>
                       
                 
                    </div>
                      </div>
                    <!-- end of governor results  -->
             
                </div>
                <div class="tab-pane fade" id="viewsenatorvotes">
                        <!-- senator results panel -->
                   <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > Constituency Presidentail Results</h5>
                     <div class="senatorpollingresults" id="senatorpollingresults">
                                  No Voting Activity Detected
                              </div>
                       </div>
                      </div>
                    <!-- end of senator results  -->
           
                </div>
                <div class="tab-pane fade" id="viewwomenrepvotes">
                 <!-- womenrep results panel -->
                    <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > Polling Station President Results</h5>
                      <div class="womenreppollingresults" id="womenreppollingresults">
                                  No Voting Activity Detected
                              </div>
                      </div>
                      </div>
                     <!-- end of womenrep results  -->
                   
                </div>
                
              
            
            </div>
          </div>
                <!-- lki -->
                      <script type="text/javascript">
     
           //load presidentila results
     $.ajax({
        url:"load_countypresident_votes.php",
        method:"POST",
        success:function(data){
          $('#presidentialcountyresults').html(data);
        }
      });
      //load governor results
     $.ajax({
        url:"load_allcounty_votes.php",
        method:"POST",
        success:function(data){
          $('#presidentialallresults').html(data);
        }
      });
      //load senator results
       $.ajax({
        url:"load_countysenator_votes.php",
        method:"POST",
        success:function(data){
          $('#senatorpollingresults').html(data);
        }
      });
      //load womenrep results
      $.ajax({
        url:"load_countywomenrep_votes.php",
        method:"POST",
        success:function(data){
          $('#womenreppollingresults').html(data);
        }
      });
      $.ajax({
        url:"../load_county.php",
        method:"POST",
        success:function(data){
          $('#county').html(data);
        }
      });

      $('#county').change(function(){
      var county=$('#county').val();
      //../load constituency
      $.ajax({
        url:"load_countypresident_votes.php",
        method:"POST",
        data:{county:county},
        dataType:"text",
        success:function(data){
          $('#presidentialcountyresults').html(data);
        }
      });
    });

    
                      </script>