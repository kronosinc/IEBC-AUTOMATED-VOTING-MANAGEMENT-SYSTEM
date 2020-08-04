<?php
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
//	$myuser = $_SESSION['presiding_username'];
	header("location:../");
?>
