<?php

	session_start();

	include '../configure.php';
	
	htmlhead();
	
	echo $_GET['roomid'];
	
	htmltail();

?>