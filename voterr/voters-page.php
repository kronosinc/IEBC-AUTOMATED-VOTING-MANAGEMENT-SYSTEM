<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Voters Page</title>
	<style type="text/css">
		body{
			background-color: aqua;
		}
		.container{
			margin-left: 5%;
			margin-right: 5%;
			text-align: center;
			background-color: white;
		}
		.nav{

		}
		.nav ul li{
			list-style: none;
			display: inline-block;
			font-size: 18px;
			padding: 5px;
			margin: 2px;
			border: 1px solid green;
			border-radius: 10px 15px 15px 10px;
		}
		.nav ul li a{
			text-decoration: none;
			color: #654635;
		}
		.nav ul li:hover {
			background-color: #546590;
		}
		.nav ul li a:hover{
			color: white;
		}
		.container form table caption{
			color: black;
			font-size: 34px;
			height: 50px;
			border: 2px solid #231423;
			border-radius: 5px 10px 10px 5px;
			background-color: green;
		}
		.container form table {
			width: 98%;
			margin-left: 1%;
			margin-right: 1%;
			margin-top: 2%;
			border-radius: 5px 10px 10px 5px;
		}
		.President {
			color: black;
			background-color: #568847;
		}
		.Governor {
			color: black;
			background-color: #543526;
		}
		.Senator {
			color: black;
			background-color: #786542;
		}
		#vote{
			height: 70px;
			width: 40%;
			font-size: 40px;
			border-radius: 12px 10px 10px 12px;
			background-color: green;
		}
	</style>
</head>
<body>
<div class="container">
<div class="nav">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="voters-page.php">Voters Page</a></li>
		<li><a href="logout.php">Sign out</a></li>
	</ul>
</div>
<h1><b>Voters Page.Please Select To Vote.</b></h1>
	<form>
	<?php
		$select_president="SELECT * FROM President Order by Sno";
		$select_governor="SELECT * FROM Governor Order by Sno";
		$select_senator="SELECT * FROM Senator Order by Sno";
		$select_senator="SELECT * FROM WomenRep Order by Sno";
	 ?>
	 <!--  -->
	 		<table border="1">
			<caption >Select your vote.</caption>
			<tr>
			<th colspan="2" class="President">Presidential Candidates</th>
			<th colspan="2" class="Governor">Gubernatorial Candidates</th>
			<th colspan="2" class="Senator">Senatorial Candidates</th>
			<th colspan="2" class="Senator">WomenRep Candidates</th>
			</tr>
			<tr>
			<td colspan="2">
				<table border="1" class="President">
				<tr>
			<th >Picture</th>
			<th >President Name</th>
			</tr>
					<?php
				$output_president='';
				//select all presidential Candidates
					$result_president=mysqli_query($conn,$select_president);
					if(mysqli_num_rows($result_president)>0){
						while ($row=mysqli_fetch_array($result_president)) {
							$output_president.='<tr><td>'.$row["FirstName"].' Photo</td><td>'.$row["FirstName"].' '. $row["MiddleInitials"].' '.$row["LastName"].' <input type="checkbox" name="'. $row["Sno"].'" value="'. $row["Sno"].'"></td></tr>';
						}
					}
						echo $output_president;
					?>
				</table>
			</td>
				<td colspan="2">
				<table border="1" class="Governor">
				<tr>
			<th >Picture</th>
			<th >Governor Name</th>
			</tr>
			<tr>
					<?php
				$output_governor='';
				//select all governor Candidates
					$result_governor=mysqli_query($conn,$select_governor);
					if(mysqli_num_rows($result_governor)>0){
						while ($row1=mysqli_fetch_array($result_governor)) {
							$output_governor.='<tr><td>'.$row1["FirstName"].' Photo</td><td>'.$row1["FirstName"].' '. $row1["MiddleInitials"].' '.$row1["LastName"].' <input type="checkbox" name="'. $row1["Sno"].'" value="'. $row1["Sno"].'"></td></tr>';

						}
					}
						echo $output_governor;
					?>
				</table>
			</td>

			<td colspan="2">
				<table border="1" class="Senator">
				<tr>
			<th >Picture</th>
			<th >Senator Name</th>
			</tr>
			<tr>
					<?php
				$output_senator='';
				//select all governor Candidates
					$result_senator=mysqli_query($conn,$select_senator);
					if(mysqli_num_rows($result_senator)>0){
						while ($row1=mysqli_fetch_array($result_senator)) {
							$output_senator.='<tr><td>'.$row1["FirstName"].' Photo</td><td>'.$row1["FirstName"].' '. $row1["MiddleInitials"].' '.$row1["LastName"].' <input type="checkbox" name="'. $row1["Sno"].'" value="'. $row1["Sno"].'"></td></tr>';

						}
					}
					else{

						$output_senator='<tr><td colspan="2">No Senator Candidate Found';
					}
						echo $output_senator;
					?>
				</table>
			</td>

			</td>
			</tr>
			<tr><td colspan="8"><input type="submit" name="vote" value="vote" id="vote"></td></tr>
			</table>
	 <!--  -->
	</form>

</div>
</body>
</html>
