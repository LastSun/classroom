<?php
	include 'common.php';

	define('ABSPATH', dirname(dirname(__FILE__)) . '/');
	
	$sql_server		=	"127.0.0.1";			//sqlserver name
	$sql_username	=	"root";					//sqlserver root username
	$sql_password	=	"woshiyygg336";			//sqlserver root password
	$sql_database	=	"classes";				//database name

	/*
	 * connect sqlserver
	 */
	if (!($sql_handle = mysql_connect($sql_server,$sql_username,$sql_password)))
	{
		//sql_linkerror();
		die("connect error");
	}
	else
	{
		mysql_select_db($sql_database);
		mysql_query("SET NAMES UTF8");
	}

	/*********************************

	 */
	function sql_link()
	{
		if (!mysql_connect($sql_server,$sql_username,$sql_password))
		{
			sql_linkerror();
			//die();
			return false;
		}
		else
		{
			mysql_select_db($sql_database);
			mysql_query("SET NAMES UTF8");
		}
		return true;
	}
	
	/************************************
		whenever sql link error,call this fuction
	 *************************************/
	function sql_linkerror()
	{
		jumphtml('htmls/sqllink_error.html');
	}
	
	
?>