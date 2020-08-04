<?php
if(isset($_POST['newvtr'])) {
$vtrname = $_POST['name'];
$vtrwrd = $_POST['ward'];
$vtrpoll = $_POST['polling'];
$vtrid = $_POST['id'];
$gender = $_POST['gender'];
$county = $_POST['county'];
}else{
	header("location:./");
}

include '../db_config/connection.php';

$sql = "SELECT * FROM user_info where id = '$vtrid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$voter = $row['full_name'];
       header("location:new_voter.php?msg=id $vtrid is not available&voter=$voter");
    }
} else {
  $regdate = date('jS \ F Y h:i:s A');
$vtrno = 'AOVS:'.rand(101,303).'/'.rand(0001,0100).'/'.rand(10,18).'';

include '../db_config/connection.php';

$sql = "INSERT INTO user_info (user_id, full_name, ward, polling, id, gender, county, regdate)
VALUES ('$vtrno', '$vtrname', '$vtrwrd', '$vtrpoll', '$vtrid', '$gender', '$county', '$vtradd', '$regdate')";

if ($conn->query($sql) === TRUE) {
    header("location:new_voter.php?message=$vtrname has been registered with ID $vtrno");
} else {
	$error = $conn->error;
     header("location:new_voter.php?err=$error");
}

$conn->close();



}
$conn->close();

?>


