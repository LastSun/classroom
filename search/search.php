<?php
	session_start();
	
	include '../configure.php';

	$query = "select * from places where placename = '$_POST[keyword]' or placeenname = '$_POST[keyword]'";

	$result = mysql_query($query);
	
	echo "<ul>";
	while ($row = mysql_fetch_array($result))
	{
		foreach ($row as $key=>$value)
		{
			echo "$key => $value<br />";
		}
	}
	echo "</ul>"
?>