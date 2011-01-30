<?php
/*
 * 显示建筑物控制面板,包括名称属性和房间
 */

	session_start();
	
	include '../configure.php';
	
	$query = "select * from places where placeid = $_POST[placeid]";
	$result = mysql_query($query);
	
	echo "<div id='placeinform'>";
	
	/*
	 * 显示建筑物属性
	 */
	echo <<< func
	<div id="oprate">
		<a class="button" href="views/editplace.php?placeid=$_POST[placeid]">编辑</a>
		<a class="button" href="views/deleteplace.php?placeid=$_POST[placeid]">删除</a>
	</div>
func;

	if($row = mysql_fetch_array($result)) {
		echo "<h1 id='placename' class='placename'>$row[placename]</h1>";
		echo "<h2 id='placename_eng' class='placename_eng'>$row[placeenname]</h2>";
	}

	
	/*
	 * 显示房间
	 */
	echo <<< roomtable
	<div id='rooms'>
		<table>
			<tr>
				<td>房间号</td>
				<td>状态</td>
				<td></td>
			</tr>
roomtable;
	
	$query = "select * from classrooms where placeid=$_POST[placeid] order by floor,roomnum";
	$result = mysql_query($query);
	$floor = '0';
	while ($row=mysql_fetch_array($result))
	{
		$sta = $row['status'];
		if ($floor != $row['floor']) 
		{
			$floor = $row['floor'];
			echo "<tr>楼层:$floor</tr>";
		}
		echo "<tr><td>$row[roomnum]</td><td>$roomstatus[$sta]</td><td><a href='$domain/views/appview.php?roomid=$row[roomid]'>申请</a></td></tr>";
	}
	
	echo "</table></div>";
	
	echo <<< script
	</div>
script;
	
?>