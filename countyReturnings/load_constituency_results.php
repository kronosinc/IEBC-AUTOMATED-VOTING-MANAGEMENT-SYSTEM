<div class="box-header" style="background-image: url('../dist/img/boxed-bg.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-info-sign" style="color:green;"></h3><b>Constituency  Results Information</b>
              <h3 class="box-title glyphicon glyphicon-info-sign" style="float:right;color:green;"></h3><b  style="float:right;"> Info<h style="color:gray;">_</h> </b>

            </div>



   <!-- lkkjuu -->
            <div class=" pull-left notifications well table-bordered" style="width: 100%;">
                    <ul id="myTab" class="nav nav-tabs" style="margin-top: -1.6%;background-color: #1f3f24;">
                       <li class="active"><a href="#viewpresidentvotes" data-toggle="tab">President</a></li>
                        <li><a href="#viewgovernorvotes" data-toggle="tab">Governor</a></li>
                       <li><a href="#viewsenatorvotes" data-toggle="tab">Senator</a></li>
                        <li > <a href="#viewwomenrepvotes" data-toggle="tab">Women Rep </a></li>
                 </ul>
            <div id="myTabContent" class="tab-content" style="margin-top: 1%;">
          
                <div class="tab-pane fade in active" id="viewpresidentvotes" style="margin-top: -1%;width: 100%;">
                <!-- presidential results panel -->
                 <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin: 2px;padding: 1px;">
                  <div class="panel" >
                  <div class="pull-left" >
                        <button class="badge bg-green" style="margin-top:8%;"><h style="color: yellow;margin-top:8%;"><b> Constituencies </b></h></button>
                     
                    </div>
                   <h5 style="text-align: center;font-size: 20px;" >President Results</h5>
                          <div class="presidentialpollingresults" id="presidentialpollingresults" >
                              No Voting Activity Detected
                          </div>
                 </div>
             
                </div>
                  <!-- end of presidential results  -->
                    
                </div> 
                <div class="tab-pane fade" id="viewgovernorvotes" style="margin-top: -1%;">
                 <!-- governor results panel -->
                <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                         <div class="pull-left" >
                        <button class="badge bg-green" style="margin-top:8%;"><h style="color: yellow;margin-top:8%;"><b> Constituencies </b></h></button>
                     
                    </div>
                       <h5 style="text-align: center;font-size: 20px;" > Governor Results</h5>
                      <div class="governorpollingresults" id="governorpollingresults">
                                  No Voting Activity Detected
                              </div>
                       
                 
                    </div>
                      </div>
                    <!-- end of governor results  -->
             
                </div>
                <div class="tab-pane fade" id="viewsenatorvotes" style="margin-top: -1%;">
                        <!-- senator results panel -->
                   <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                         <div class="pull-left" >
                        <button class="badge bg-green" style="margin-top:8%;"><h style="color: yellow;margin-top:8%;"><b> Constituencies </b></h></button>
                     
                    </div>
                       <h5 style="text-align: center;font-size: 20px;" > Senator Results</h5>
                     <div class="senatorpollingresults" id="senatorpollingresults">
                                  No Voting Activity Detected
                              </div>
                       </div>
                      </div>
                    <!-- end of senator results  -->
           
                </div>
                <div class="tab-pane fade" id="viewwomenrepvotes" style="margin-top: -1%;">
                 <!-- womenrep results panel -->
                    <div class="btn btn- well pull-left"  style="color:black;width: 100%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                         <div class="pull-left" >
                        <button class="badge bg-green" style="margin-top:8%;"><h style="color: yellow;margin-top:8%;"><b> Constituencies </b></h></button>
                     
                    </div>
                       <h5 style="text-align: center;font-size: 20px;" > Women-Rep Results</h5>
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
        url:"load_constituencypresident_votes.php",
        method:"POST",
        success:function(data){
          $('#presidentialpollingresults').html(data);
        }
      });
      //load governor results
     $.ajax({
        url:"load_constituencygovernor_votes.php",
        method:"POST",
        success:function(data){
          $('#governorpollingresults').html(data);
        }
      });
      //load senator results
       $.ajax({
        url:"load_constituencysenator_votes.php",
        method:"POST",
        success:function(data){
          $('#senatorpollingresults').html(data);
        }
      });
      //load womenrep results
      $.ajax({
        url:"load_constituencywomenrep_votes.php",
        method:"POST",
        success:function(data){
          $('#womenreppollingresults').html(data);
        }
      });
      //load mp results
      $.ajax({
        url:"load_constituencymp_votes.php",
        method:"POST",
        success:function(data){
          $('#mppollingresults').html(data);
        }
      });
      //load mca results
      $.ajax({
        url:"load_constituencymca_votes.php",
        method:"POST",
        success:function(data){
          $('#mcapollingresults').html(data);
        }
      });
                      </script>