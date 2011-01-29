<?php
	session_start();
	
	include '../configure.php';
	
	$query = "insert into classrooms (roomnum,users,contact,usetext,belong,floor,roomname) values ('$_POST[roomnum]','$_POST[users]','$_POST[contact]','$_POST[usetext]','$_POST[belong]','$_POST[floor]','$_POST[roomname]');";
	if (mysql_query($query)) echo 'OK';
	else echo $query;

?>