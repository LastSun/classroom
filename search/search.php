<?php
	session_start();
	
	include '../configure.php';

	$result = "select * from places where placename = $_POST[keyword]";

?>