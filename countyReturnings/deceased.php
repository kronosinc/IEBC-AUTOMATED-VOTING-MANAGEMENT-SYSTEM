<!DOCTYPE html>
<html>
<head>
	<title>Regions</title>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../mainstyle.css">
	<script type="text/javascript" src="../jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<!-- responsive navbar fixed top -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-left:2%;width: 95%;background-color: #eef;">
 <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
  </button>
   <a class="navbar-brand hidden-xs" href="#">ELDERLY/ADMIN</a> 
  </div> 
   <div class="collapse navbar-collapse" id="example-navbar-collapse"> 
    <ul class="nav navbar-nav navbar-left">
     <li class="active"><a href="index.php">Home</a></li> 
      <li><a href="chief.php">Chief</a></li> 
     <li><a href="reports.php">Reports</a></li> 
     <li><a href="payment.php" >Payment</a></li>
     <li><a href="deceased.php" ">Deceased</a></li>
     
     <li class="dropdown">
     
      </li> 
    </ul>
   <ul class="nav navbar-nav navbar-right"> 
  <li><a href="../index.php" class="pull-right">logout</a></li>
    </ul>  
  </div>
 </nav>
<div class="well  pull-left" style="margin-left:2%;width:45%;min-width:250px;">
<h3>New Regions</h3>
	<button class="btn btn-small btn-primary" name="addsubcounty" id="addsubcounty" style="width:200px; padding:10px;margin:2px;">add sub county</button>
	<button class="btn btn-small btn-primary" name="addconstituency" id="addconstituency" style="width:200px; padding:10px;margin:2px;">add constituency</button><br>
	<button class="btn btn-small btn-primary" name="addward" id="addward" style="width:200px; padding:10px;margin:2px;">add ward</button>
	<button class="btn btn-small btn-primary" name="addlocation" id="addlocation" style="width:200px; padding:10px;margin:2px;">add location</button><br>
	<button class="btn btn-small btn-primary" name="addsublocation" id="addsublocation" style="width:200px; padding:10px;margin:2px;">add sub location</button>
	<button class="btn btn-small btn-primary" name="addvillage" id="addvillage" style="width:200px; padding:10px;margin:2px;">add village</button>
</div>
<div class="well  pull-left" style="margin-left:2%;width:45%;min-width:250px;">
<h3>View Regions</h3>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view sub county <span class="badge">23</span></button>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view constituency <span class="badge">45</span></button>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view ward <span class="badge">67</span></button>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view location <span class="badge">78</span></button>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view sub location <span class="badge">89</span></button>
	<button class="btn btn-small btn-warning" style="width:200px; padding:10px;margin:2px;">view village <span class="badge">90</span></button>
</div>

<!-- <div class="well pull-left" style="margin-left:2%;width:30%;min-width:250px;">
<h4><b>login details</b></h4>
	<div class="form-group has-feedback ">
	<label class="">Phone number</label>
	<input type="text" name="FirstName" class="form-control">
</div>
<div class="form-group has-feedback ">
	<label class="">password</label>
	<input type="password" name="FirstName" class="form-control">
</div>
<div class="form-group has-feedback ">
	<label class="">confirm password</label>
	<input type="password" name="FirstName" class="form-control">
</div>

</div>
</div>
<div class="alert">
	<button class="btn btn-block btn-primary">register regions</button>
</div> -->
</div>
<!-- trial bootstrab modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
aria-hidden="true">X
</button>
<h4 class="modal-title" id="myModalLabel">
Elderly Message Information
</h4>
</div>
<div class="modal-body" id="msg">
Elderly Message Alert
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of bootstra modal -->

</body>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
	$('#addsubcounty').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add subcounty");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">subcounty Code</label><input type="number" name="number" id="number" class="form-control"></div><div class="form-group has-feedback "><label class="">subcounty Name</label><input type="text" name="subcounty" id="subcounty" class="form-control" placeholder="Enter subcounty Name"><div class="alert"><button class="addsubcountybtn btn btn-block btn-primary">Add subcounty</button></div> ');
		$('#myModal').modal('show');
	    });
$('.addsubcountybtn').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add subcounty");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">subcounty Code</label><input type="number" name="number" id="number" class="form-control"></div><div class="form-group has-feedback "><label class="">subcounty Name</label><input type="text" name="subcounty" id="subcounty" class="form-control" placeholder="Enter subcounty Name"><div class="alert"><button class="addcountybtn btn btn-block btn-primary">Add subcounty</button></div> ');
		$('#myModal').modal('show');
	    });



	    

	
		$('#addward').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add ward");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">wardcode Code</label><input type="text" name="wardcode" id="wardcode" class="form-control" placeholder="Enter ward Code"></div><div class="form-group has-feedback "><label class="">ward Name</label><input type="text" name="wardname" id="wardname" class="form-control" placeholder="Enter ward Name"></div><div class="form-group has-feedback "><label class="">constituency</label><select name="constituencycode" id="constituencycode" class="select form-control"><option value="">Select constituency</option></select> </div><div class="alert"><button class="btn btn-block btn-primary">Add ward</button></div> ');
		$('#myModal').modal('show');
		});


		$('#addconstituency').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add constituency");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">constituency Code</label><input type="text" name="constituency" id="constituencycode" class="form-control" placeholder="Enter constituencycode"></div><div class="form-group has-feedback "><label class="">constituency Name</label><input type="text" name="constituencyname" id="constituencyname" class="form-control" placeholder="Enter constituency Name"></div><div class="form-group has-feedback "><label class="">constituency</label><select name="subcountycode" id="subcountycode" class="select form-control"><option value="">Select subcounty</option></select> </div><div class="alert"><button class="btn btn-block btn-primary">Add constituency</button></div> ');
		$('#myModal').modal('show');
	});
		$('#addlocation').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add location");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">location Code</label><input type="number" name="wardcode" id="wardcode" class="form-control" placeholder="Enter ward Code"></div><div class="form-group has-feedback "><label class="">location Name</label><input type="text" name="locationname" id="locationname" class="form-control" placeholder="Enter location Name"></div><div class="form-group has-feedback "><label class="">ward</label><select name="wardcode" id="wardcode" class="select form-control"><option value="">Select ward</option></select> </div><div class="alert"><button class="btn btn-block btn-primary">Add location</button></div> ');
		$('#myModal').modal('show');
		});
		$('#addsublocation').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add sublocation");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">sublocation Code</label><input type="number" name="sublocationcode" id="sblocationcode" class="form-control" placeholder="Enter sublocation Code"></div><div class="form-group has-feedback "><label class="">sublocation Name</label><input type="text" name="sublocationname" id="sublocationname" class="form-control" placeholder="Enter sublocation Name"></div><div class="form-group has-feedback "><label class="">location</label><select name="location" id="location" class="select form-control"><option value="">Select location</option></select> </div><div class="alert"><button class="btn btn-block btn-primary">Add sublocation</button></div> ');
		$('#myModal').modal('show');
		});
			$('#addvillage').click(function(){
		$('#myModal').modal({"backdrop":"static"});
		$('#myModalLabel').html("Add village");
		$('#msg').html('<h4>Fill All Details</h4><div class="well pull-left" style="margin-left:2%;width:90%;min-width:250px;"><div class="form-group has-feedback "><label class="">village Code</label><input type="number" name="number" id="number" class="form-control" placeholder="Enter village Code"></div><div class="form-group has-feedback "><label class="">village Name</label><input type="text" name="village" id="village" class="form-control" placeholder="Enter village Name"><div class="alert"><button class="btn btn-block btn-primary">Add village</button></div> ');
		$('#myModal').modal('show');
	    });


</script>
</html>