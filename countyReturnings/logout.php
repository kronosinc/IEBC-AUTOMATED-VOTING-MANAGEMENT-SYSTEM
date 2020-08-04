<?php
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	// $myuser = $_SESSION['countyreturnings_username'];
	header("location:../");
?>
