<?php
	
	/********************************
	 * function:	jumphtml
	 * paraments:	html location
	 * return		none
	 */
	function jumphtml($location)
	{
		echo "<script type='text/javascript'>window.location.replace('" . DOMAIN . $location . "');</script>";
	}
	
	function htmlhead($title="undefined")
	{
		global $jquerylib,$jslib;
		echo <<< htmlhead
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			    <link type="text/css" href="css/all.css" rel="stylesheet" />
				<script type="text/javascript" src="$jquerylib"></script>
				<script type="text/javascript" src="$jslib/conf.js"></script>
				<title>$title</title>
			</head>
			<body>
htmlhead;
	}
	
	function htmltail()
	{
		echo <<< htmltail
			</body>
		</html>
htmltail;
	}
	
?>