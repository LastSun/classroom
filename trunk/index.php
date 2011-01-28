<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	    <link type="text/css" href="css/all.css" rel="stylesheet" />
	    <link type="text/css" href="css/index.css" rel="stylesheet" />
		<script type="text/javascript" src="jQuerylib/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/googlemap.js"></script>
		<script type="text/javascript" src="js/control_map.js"></script>
		<script type="text/javascript" src="js/conf.js"></script>
		<title> </title>
	</head>
	<body>
    	<?php
    		session_start();
    		include 'configure.php';
		?>
		<div id="left">
			<div id="logo"></div>
			<div id="leftdown">
				<div id="roominform"></div>
			</div>
		</div>
		<div id="map_canvas"></div>
		<div id="pannel">
			<div id="select_position">
				<a id="stcen_dongqu" class="button">东区</a>
				<a id="stcen_xiqu" class="button">西区</a>
				<a id="stcen_nanqu" class="button">南区</a>
				<a id="stcen_beiqu" class="button">北区</a>
			</div>
			<div id="control">
				<a id="ctrl_edit" class="button">编辑</a>
				<a id="ctrl_save" class="button">保存</a>
			</div>
			<div id="mouseplacename"></div>
		</div>
		<div id="inform"></div>
    </body>
</html>