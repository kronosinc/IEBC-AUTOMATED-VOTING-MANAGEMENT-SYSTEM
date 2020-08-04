<?php
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	$uname = $_SESSION['uname'];
	header("location:../");
?>
