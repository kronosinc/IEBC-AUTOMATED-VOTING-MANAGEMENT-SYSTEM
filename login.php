<?php  
 require('admindb_connect.php');
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT Userrole FROM `userroles` WHERE UserID='$username'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
	while ($row=mysqli_fetch_array($result)){
		$Userrole=$row['Userrole'];
		echo $Userrole;
// switch ($Userrole) {
// 			case 'Administrator':
// 			{
// 				$queryuserrole ="SELECT * FROM `adminlogin` WHERE username='$username' and password='$password'";
// 				$resultuserrole = mysqli_query($connection, $queryuserrole) or die(mysqli_error($connection));
// 				$countuserrole = mysqli_num_rows($resultuserrole);
// 				if ($countuserrole == 1){
// 					// setcookie("stream",$stream,time()+300);
// 					session_start();
// 						$_SESSION['admin_session']=$username;
// 				header("location:index.php");
// 				 					}
//  					else{
// 						header("location:../index.php?ref=Invalid Login Credentials");
// 				}
// 				break;
// 			}
// 			case 'HudumaUser':
// 				{
// 					$queryuserrole ="SELECT * FROM `hcuserlogin` WHERE username='$username' and password='$password'";
//  					$resultuserrole = mysqli_query($connection, $queryuserrole) or die(mysqli_error($connection));
// 					$countuserrole = mysqli_num_rows($resultuserrole);
// 					if ($countuserrole == 1){
// 						session_start();
// 						$_SESSION['huduma_session']=$username;
// 						header("location:../hcuser/index.php");
//  					}
//  					else{
// 						header("location:../index.php?ref=Invalid Login Credentials");
// 				}
// 				break;
// 				}
// 			case 'Applicant':
// 				{
// 					$queryuserrole ="SELECT * FROM `applyid` WHERE birthcertificatenumber='$username' and waitingnumber='$password'";
//  					$resultuserrole = mysqli_query($connection, $queryuserrole) or die(mysqli_error($connection));
// 					$countuserrole = mysqli_num_rows($resultuserrole);
// 					if ($countuserrole == 1){
// 						session_start();
// 						$_SESSION['applicant_session']=$username;
// 						header("location:../client/index.php");
//  					}
//  					else{
// 						header("location:../index.php?ref=Invalid Login Credentials");
// 				}
// 				break;
// 				}
// 				case 'Chief':
// 				{
// 					$queryuserrole ="SELECT * FROM `chief` WHERE Username='$username' and Password='$password'";
//  					$resultuserrole = mysqli_query($connection, $queryuserrole) or die(mysqli_error($connection));
// 					$countuserrole = mysqli_num_rows($resultuserrole);
// 					if ($countuserrole == 1){
// 						session_start();
// 						$_SESSION['chief_session']=$username;
// 						header("location:../chief/index.php");
//  					}
//  					else{
// 						header("location:../index.php?ref=Invalid Login Credentials");
// 				}
// 				break;
// 				}
// 				default:
// 				{
// 					header("location:../index.php?ref=Unknow User");
// 					break;
// 				}
// 			}
}
}
else
{
	echo "<script>alert('Enter Correct UserID');
window.location='../index.php';</script>";
}
}
else
{
	echo "<script>alert('No UserID or Password');
window.location='../index.php';</script>";
}

?>