<?php
	session_start();
	
	include "../configure.php";
	
	//if(!$_SESSION["login"]) echo "0";
	
	$query = "select polys,placename,placeid from places";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
		echo "$row[polys]<$row[placename]<$row[placeid];";