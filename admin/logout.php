<?php
	session_start(1);
	$_SESSION['loggedin'] = false;
	session_destroy(1);
	// $myuser = $_SESSION['username'];
	header("location:../");
?>
