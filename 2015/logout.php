<?php 


	session_start();
		$_SESSION['username'] = null;
		$_SESSION['name'] = null;
		$_SESSION['email'] = null;
		$_SESSION['user_id'] = null;
	header("location: login.php");