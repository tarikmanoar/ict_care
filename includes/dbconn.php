<?php 

	$dbconn = mysqli_connect("localhost","root","","php_ictcare");

	if (!$dbconn) {
		echo "Database Connection ERROR!". mysqli_error($dbconn);
	}else {
		// echo 'string';
	}
