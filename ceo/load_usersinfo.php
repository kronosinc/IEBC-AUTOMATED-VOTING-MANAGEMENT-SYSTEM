      <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box" style="background-color:#1f3f24;">
            <div class="inner">
              <span  style="font-size:100%;"> County Returning    </span> <span class="badge pull-right" style="padding: 10px;font-size:80%;width: 70px;background-color:white;color: black;" ><?php
              include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM countyreturnings ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close();
               ?></span>
            </div>
            <br>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a  class="addCROview btn small-box-footer glyphicon glyphicon-signal"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box" style="background-color:#1f3f24;">
            <div class="inner">
            <span  style="font-size:100%;"> Presidings</span>  <span class="badge pull-right" style="padding: 10px;font-size:80%;width: 70px;background-color:white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM presiding ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?><sup style="font-size: 20px"></sup></span>
            </div>
            <br>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a  class="addpresidingview btn small-box-footer glyphicon glyphicon-signal"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box " style="background-color:#1f3f24;">
            <div class="inner">
                <span  style="font-size:100%;"> Returnings</span> <span class="badge pull-right" style="padding: 10px;font-size:80%;width: 70px;background-color:white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM returnings ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?></span>
            </div>
            <br>
            <div class="icon">
              <i class="fa fa-thumbs-o-up"></i>
            </div>
            <a class="addcroview btn small-box-footer glyphicon glyphicon-signal"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" style="color:white">
          <div class="small-box " style="background-color:#1f3f24;">
            <div class="inner">
              <span  style="font-size:100%;"> Clerks</span> <span class="badge pull-right" style="padding: 10px;font-size:80%;width: 70px;background-color:white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM clerk ";
                     $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo $row['Total'];
                       }
                         } else {

                        }
                         $conn->close(); ?></span>
            </div>
            <br>
            <div class="icon">
              <i class="fa fa-thumbs-o-down"></i>
            </div>
            <a  class="addclerkview btn small-box-footer glyphicon glyphicon-signal"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <script type="text/javascript">
          
          //create view CRO modal
  $('.addCROview').click(function(){
    updateCRO();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update County Returning Officer Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updateCRO();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view CRO modal
//create view presiding modal
  $('.addpresidingview').click(function(){
    updatepresiding();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update Presiding Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatepresiding();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view presiding modal
//create view presiding modal
  $('.addclerkview').click(function(){
    updateclerk();
     //  $('#myModal').fullscreen();
     // $('#myModal').modal({"backdrop":"static"});
     //     $("#myModalLabel").html("Update Clerk Details");  
     //      $("#myModal").modal('show');
           $('#okay').click(function(){
          updateclerk();
         });
           $('#pressokay').click(function(){
           window.location="index.php";
         });
  });
//end of view agent modal
//create view cro modal
  $('.addcroview').click(function(){
    updatecro();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update Constituency Returning Officer Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatecro();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });

//end of view cro modal

        </script>