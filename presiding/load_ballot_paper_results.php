<div class="box-header" style="background-image: url('../dist/img/boxed-bg.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title glyphicon glyphicon-user" style="color:green;"></h3><b>Candidates Results Information</b>
              <h3 class="box-title glyphicon glyphicon-info-sign" style="float:right;color:green;"></h3><b  style="float:right;"> Info<h style="color:gray;">_</h> </b>

            </div>
               <!--  <form action="add_voter.php" method="post" enctype="multipart/form-data"> -->
                      <!-- presidential results panel -->
                  <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                     <div class="panel">
                   <h5 style="text-align: center;font-size: 20px;" >President Results </h5>

                          <div class="presidentialpollingresults" id="presidentialpollingresults">
                              No Voting Activity Detected
                          </div>
                     <!-- <a href="voters_page.php?user='.$row['nid'].'"> -->
                   <button class="submitpresidential btn btn-block btn-primary" style="">Transmit Presidential Results </button>
             
                </div>
                  </div>
                  <!-- end of presidential results  -->
                <!-- governor results panel -->
                <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > Governor Results</h5>
                      <div class="governorpollingresults" id="governorpollingresults">
                                  No Voting Activity Detected
                              </div>
                        <!--  <a href="voters_page.php?user='.$row['nid'].'"> -->
                        <button class="submitgovernor btn btn-block btn-primary" style="">Transmit Governor Results  </button><!-- </a> -->
                 
                    </div>
                      </div>
                    <!-- end of governor results  -->
                                      <!-- senator results panel -->
                   <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > Senator Results</h5>
                     <div class="senatorpollingresults" id="senatorpollingresults">
                                  No Voting Activity Detected
                              </div>
                        <!--  <a href="voters_page.php?user='.$row['nid'].'"> --><button class="submitsenator btn btn-block btn-primary" style="">Transmit Senator Results</button><!-- </a> -->
                    </div>
                      </div>
                    <!-- end of senator results  -->
                  
                 

              <!-- womenrep results panel -->
                    <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > W.Rep Results</h5>
                      <div class="womenreppollingresults" id="womenreppollingresults">
                                  No Voting Activity Detected
                              </div>
                        <!--  <a href="voters_page.php?user='.$row['nid'].'"> --><button class="submitwomenrep btn btn-block btn-primary" style="">Transmit W. Rep Results</button><!-- </a> -->
                    </div>
                      </div>
                     <!-- end of womenrep results  -->
                    <!-- mp results panel -->
                    <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > MP Results</h5>
                       <div class="mppollingresults" id="mppollingresults">
                                  No Voting Activity Detected
                              </div>
                         <!-- <a href="voters_page.php?user='.$row['nid'].'"> --><button class="submitmp btn btn-block btn-primary" style="">Transmit MP Results</button><!-- </a> -->
                    </div>
                      </div>
                    
                   <!-- end of mp results  -->
                    <!-- mca results panel -->
                       <div class="btn btn-warning well pull-left"  style="color:black;width: 48%;min-width:240px;margin-left: 10px;padding: 3px;">
                         <div class="panel">
                       <h5 style="text-align: center;font-size: 20px;" > MCA Results</h5>
                      <div class="mcapollingresults" id="mcapollingresults">
                                  No Voting Activity Detected
                              </div>
                    <button class="submitmca btn btn-block btn-primary" style="">Transmit MCA Results </button><!-- </a> -->
                    </div>
                      </div>
                      <script type="text/javascript">
                        //transmit President votes
      $('.submitpresidential').click(function(){
           $("#msg").html("You Are About to Transmit  President Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="President";
  });
      $('.confirmresultstransmission').click(function(){
      transmitvotes(type);
       });
      //transmit Governor votes
      $('.submitgovernor').click(function(){
           $("#msg").html("You Are About to Transmit  Governor Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="Governor";
  });
      //transmit Senator votes
      $('.submitsenator').click(function(){
           $("#msg").html("You Are About to Transmit  Senator Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="Senator";
  });
      //transmit Women REP votes
      $('.submitwomenrep').click(function(){
           $("#msg").html("You Are About to Transmit  Women REP Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="WomenRep";
  });
      //transmit MP votes
      $('.submitmp').click(function(){
           $("#msg").html("You Are About to Transmit MP Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="MP";
  });
       //transmit MCA votes
      $('.submitmca').click(function(){
           $("#msg").html("You Are About to Transmit MCA Results from Your Polling Station to Presiding Officer");
          $("#myModalLabel").html("Confirm Result Transmission");
           $("#confirmresultstransmission").show();
           $("#confirmresultstransmission").html("Press Here To Transmit Results to Presiding ");
            $("#myModal").modal('show');
          type="MCA";
  });
                      </script>