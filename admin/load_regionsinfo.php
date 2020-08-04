  <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box " style="background-color:#1f3f24;">
            <div class="inner">
               <span  style="font-size:100%;"> <b>Counties</b></span> <span class="badge" style="padding: 10px;font-size:80%;width: 70px;background-color: white;color: black;" ><?php
              include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM county ";
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
            <a  class="addcountyview btn btn-link small-box-footer glyphicon glyphicon-list"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box " style="background-color:#1f3f24;">
            <div class="inner">
             <span style="font-size:100%;"> <b>Constituencies</b></span> <span class="badge" style="padding: 10px;font-size:80%;width: 70px;background-color: white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM constituency ";
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
            <a  class="addconstituencyview btn btn-link small-box-footer glyphicon glyphicon-list"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box" style="background-color:#1f3f24;">
            <div class="inner">
            <span style="font-size:100%;"> <b>Wards</b></span> <span class="badge" style="padding: 10px;font-size:80%;width: 70px;background-color: white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM ward ";
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
            <a  class="addwardview btn btn-link small-box-footer glyphicon glyphicon-list"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" style="color:white;">
          <div class="small-box" style="background-color:#1f3f24;">
            <div class="inner">
             <span  style="font-size:100%;"> <b>Polling Stations</b></span> <span class="badge" style="padding: 10px;font-size:80%;width: 70px;background-color: white;color: black;" ><?php include '../db_config/connection.php';

              $sql = "SELECT count(*) as Total FROM polling ";
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
            <a  class="addpollingview btn btn-link small-box-footer glyphicon glyphicon-list"> More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="false">
<div class="modal-dialog">
<div class="modal-content" style="background-image: url('../dist/img/green_crystals.jpg');background-repeat: no-repeat;  background-size: cover;background-position: center;opacity:1.0;" >
<div class="modal-header" style="background-color: lightsteelblue;">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel" >
AMVS Message Information
</h4>
</div>
<div class="modal-body" id="msg">
<h1 align="center" class="border"><br><br><br><br>
    <div style="margin:0 auto; text-align:center;">
    Loading...
    <??>
    <br>
    <img src="../dist/img/loading.gif" >
    <br></div></h1>
</div>

<div class="modal-footer" style="background-color: lightsteelblue;">
<button type="button" class="btn btn-default" data-dismiss="modal" id="pressokay">Ok
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        <script type="text/javascript">
          
              $('.addcountyview').click(function(){
    updatecounty();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update County Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatecounty();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
 function updatecounty(){
       $.ajax({
          url:"load_update_county.php",
          method:"POST",
          success:function(data){
            $('#viewregions').html(data);
          }
        });
      }
          $('.addconstituencyview').click(function(){
    updateconstituency();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update Constituency Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updateconstituency();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
 function updateconstituency(){
       $.ajax({
          url:"load_update_constituency.php",
          method:"POST",
          success:function(data){
            $('#viewregions').html(data);
          }
        });
      }

          $('.addwardview').click(function(){
    updateward();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update Ward Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updateward();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
 function updateward(){
       $.ajax({
          url:"load_update_ward.php",
          method:"POST",
          success:function(data){
            $('#viewregions').html(data);
          }
        });
      }
            $('.addpollingview').click(function(){
    updatepolling();
     // $('#myViewModal').modal({"backdrop":"static"});
     //     $("#myViewModalLabel").html("Update Polling Details");  
     //      $("#myViewModal").modal('show');
           $('#okay').click(function(){
          updatepolling();
         });
           $('#viewpressokay').click(function(){
           window.location="index.php";
         });
  });
 function updatepolling(){
       $.ajax({
          url:"load_update_polling.php",
          method:"POST",
          success:function(data){
            $('#viewregions').html(data);
          }
        });
      }

      
//         $(document).on('click','.editbtn',function(){
// //alert("sdfg");
//     $('#myModal').modal({"backdrop":"static"});
//     var ref=$(this).data("id1");
//      //alert(ref);
//     var uname=$(this).data("id2");
//      $.ajax({
//       url:"update_county_det.php",
//       method:"POST",
//       data:{ref:ref},
//       dataType:"text",
//       success:function(data){
//          $('#msg').html(data);
//         $("#myModalLabel").html("AMVS President Success");
//         $("#myModal").modal('show');
//        //  $("#closeokay").show();
//        // $('#replaymsg').html(data);
//        //  $("#myModalLabel").html("AMVS Presiding Edit"+uname);
//        //  $("#myModal").modal('show');
//       }
//     });

//   });
  
        </script>