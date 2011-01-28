<?php
	session_start();
	
	include '../configure.php';
	
	//if(!$_SESSION['login']) die("0");
	
	if ($_POST['action'] == "insert")
		$query = "insert into places (polys,placename) values ('" . $_POST['polys'] . "','" . $_POST['placename'] . "')";
	else if($_POST['action'] == "update")
		$query = "update places set placename = '$_POST[placename]',placeenname='$_POST[placeenname]' where placeid = '" . $_POST['placeid'] . "' limit 1";
	
	if(mysql_query($query)) echo "OK";
	else echo "error";
?>