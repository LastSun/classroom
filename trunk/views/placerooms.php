<?php
	session_start();
	
	include '../configure.php';
	
	$query = "select * from places where placeid = $_POST[id]";
	$result = mysql_query($query);
	
	echo "<div id='placeinform'>";
	echo <<< func
	<div id="oprate">
		<a class="button" href="views/editplace.php?placeid=$_POST[id]">编辑</a>
		<a class="button" href="views/deleteplace.php?placeid=$_POST[id]">删除</a>
	</div>
func;
	if($row = mysql_fetch_array($result)) {
		echo "<h1 id='placename' class='placename'>$row[placename]</h1>";
		echo "<h2 id='placename_eng' class='placename_eng'>$row[placeenname]</h2>";
	}
	echo <<< script
	</div>
script;
	
?>