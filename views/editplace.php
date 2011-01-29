<?php
/*
 * 编辑地点表单,包含建筑物名称及室内房间编辑
 */
	session_start();
	
	include '../configure.php';

	echo <<< htmlhead
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <link type="text/css" href="css/all.css" rel="stylesheet" />
		<script type="text/javascript" src="$jquerylib"></script>
		<script type="text/javascript" src="$jslib/conf.js"></script>
		<script type="text/javascript" src="$jslib/editplace_script.js"></script>
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

	echo <<< editroom
	<hr />
	<div id="addinit">
		<p>
			<label for="roomfloor">楼层:</label><input size="2" type="text" name="roomfloor" id="roomfloor" />
			<label for="roomstart">房间号:</label><input size="5" type="text" name="roomstart" id="roomstart" /> - <input size="5" type="text" name="roomend" id="roomend" />
			<input type="button" id="addinit_button" value="增加" />
		</p>
	</div>
	<table>
		<tr>
			<td><label for="roomnum">房间号</label></td>
			<td><label for="roomname">房间名</label></td>
			<td><label for="roomuse">用途</label></td>
			<td><label for="roomuser">联系人</label></td>
			<td><label for="roomcontact">电话号码</label></td>
			<td></td>
		</tr>
		<tr>
			<td><input type="text" name="roomnum" id="roomnum" /></td>
			<td><input type="text" name="roomname" id="roomname" /></td>
			<td><input type="text" name="roomuse" id="roomuse" /></td>
			<td><input type="text" name="roomuser" id="roomuser" /></td>
			<td><input type="text" name="roomcontact" id="roomcontact" /></td>
			<td><input type="button" name="add" id="addroom" value="增加" /></td>
		</tr>
	</table>
editroom;
	
	echo <<< htmltail
	</body>
	</html>
htmltail;
?>