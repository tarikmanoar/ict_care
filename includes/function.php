<?php 

	function query($query){
		global $dbconn;
		return mysqli_query($dbconn,$query);
	}
	function real_escape($string){
		global $dbconn;
		return mysqli_real_escape_string($dbconn,$string);
	}
	function stringLimit($text , $length){
		global $dbconn;
		if (strlen($text) <= $length) {
			return $text;
		}else {
			return substr($text , 0, $length);
		}
}