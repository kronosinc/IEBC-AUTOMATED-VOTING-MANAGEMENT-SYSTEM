<?php
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	// $myuser = $_SESSION['ceo_username'];
	header("location:../");
?>
