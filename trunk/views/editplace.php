<?php

	session_start();
	
	include '../configure.php';

	echo <<< htmlhead
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <link type="text/css" href="css/all.css" rel="stylesheet" />
		<script type="text/javascript" src="jQuerylib/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/conf.js"></script>
		<title> </title>
	</head>
	<body>
htmlhead;

	$query = "select * from places where placeid = $_GET[placeid]";
	$result = mysql_query($query);
	if(!($row = mysql_fetch_array($result)))
		die("database error</body></html>");
	
	echo <<< form
	<form action="../model/saveplace.php" method="post">
		<p>中文全称：<input type="text" name="placename" value=$row[placename] /></p>
		<p>英文全称：<input type="text" name="placeenname" value=$row[placeenname] /></P>
		<p><input type="submit" name="submit" value="确定" /></p>
		<input type="hidden" name="placeid" value=$_GET[placeid] />
		<input type="hidden" name="action" value="update" />
	</form>
form;
	
	echo <<< htmltail
	</body>
	</html>
htmltail;
?>