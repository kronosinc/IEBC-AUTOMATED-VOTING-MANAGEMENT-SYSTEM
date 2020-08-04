<?php
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	// $myuser = $_SESSION['chairman_username'];
	header("location:../");
?>
