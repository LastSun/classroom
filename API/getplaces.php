<?php
	session_start();
	
	if(!$_SESSION['login']) die("notlogin");
	
?>