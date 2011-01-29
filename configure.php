<?php
	include 'common.php';

	define('ABSPATH', dirname(dirname(__FILE__)) . '\\');
	
	$domain = "http://127.0.0.1/classroomselect/";
	$jquerylib = $domain . "jQuerylib/jquery-1.4.2.min.js";
	$jslib = $domain . "js";
	
	$sql_server		=	"127.0.0.1";			//sqlserver name
	$sql_username	=	"root";					//sqlserver root username
	$sql_password	=	"";						//sqlserver root password
	$sql_database	=	"classes";				//database name

	$roomstatus = array("","空闲");
	
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