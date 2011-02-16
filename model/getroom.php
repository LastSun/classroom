<?php

	session_start();
	
	include '../configure.php';

	$query="select * from classrooms where placeid='$_POST[placeid]' order by floor,roomnum";
	
	if ($result = mysql_query($query))
	{
		$floor = '0';
		echo "<table>";
		echo "<tr><td>楼层</td><td>房间号</td><td>房间名</td><td>用途</td><td>联系人</td><td>电话号码</td></tr>";
		while ($row=mysql_fetch_array($result))
		{
			if ($floor != $row['floor']) 
			{
				$floor = $row['floor'];
				echo "<tr>楼层:$floor</tr>";
			}
			echo "<tr><td>$row[floor]</td><td>$row[roomnum]</td><td>$row[roomname]</td><td>$row[usetext]</td><td>$row[users]</td><td>$row[contact]</td></tr>";
		}
	}
	else
	{
		echo "database error";
	}
?>