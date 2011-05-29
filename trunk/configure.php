<?php
	
	define('ABSPATH', dirname(dirname(__FILE__)) . '\\');
	
	//$domain		=	"http://127.0.0.1/classroomselect";
	$domain		=	"";
	$jquerylib	=	$domain . "jQuerylib/jquery-1.4.4.min.js";
	$jqueryui	=	$domain . "jQuerylib/jquery-ui-1.8.9.custom.min.js";
	$jslib		=	$domain . "js";
	$jqueryuitheme		=	$domain . "css/custom-theme/jquery-ui-1.8.9.custom.css";
	
	$sql_server		=	"127.0.0.1";			//sqlserver name
	$sql_username	=	"root";					//sqlserver root username
	$sql_password	=	"woshiyygg336";			//sqlserver root password
	$sql_database	=	"classes";				//database name

	$roomstatus = array("","空闲");
	
	$calendar = CAL_GREGORIAN;
	
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
	
	include 'common.php';
?>