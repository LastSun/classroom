<?php
	
	/********************************
	 * function:	jumphtml
	 * paraments:	html location
	 * return		none
	 */
	function jumphtml($location)
	{
		echo "<script type='text/javascript'>window.location.replace('" . DOMAIN . $location . "');</script>";
	}
	
	function htmlhead($title="undefined",$ui="nui")
	{
		global $jquerylib,$jslib,$jqueryui,$jqueryuitheme;
		echo <<< htmlhead
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			    <link type="text/css" href="css/all.css" rel="stylesheet" />
				<script type="text/javascript" src="$jquerylib"></script>
				<script type="text/javascript" src="$jslib/conf.js"></script>
htmlhead;
		if ($ui=="ui")
		{
			echo "<script type='text/javascript' src='$jqueryui'></script>";
			echo "<link type='text/css' href='$jqueryuitheme' rel='stylesheet' />";
		}
		echo "<title>$title</title>";
	}
	
	function htmlheadend()
	{
		echo <<< head
			</head>
			<body>
head;

	}
	
	function htmltail()
	{
		echo <<< htmltail
			</body>
		</html>
htmltail;
	}
	
	function addjs($jsname)
	{
		global $jslib;
		echo "<script type='text/javascript' src='$jslib/$jsname'></script>";
	}
	

	//要过滤的非法字符
	$ArrFiltrate=array("'",";","\"","<",">");
	
	//出错后要跳转的url,不填则默认前一页
	$StrGoUrl="";
	
	//是否存在数组中的值
	function FunStringExist($StrFiltrate,$ArrFiltrate){
		foreach ($ArrFiltrate as $key=>$value)
			if (strstr($StrFiltrate,$value)) return true;
		return false;
	}

	//合并$_POST 和 $_GET
	if(function_exists(array_merge))
	{
		$ArrPostAndGet=array_merge($_POST,$_GET);
	}
	else
	{
		foreach($HTTP_POST_VARS as $key=>$value) $ArrPostAndGet[]=$value;
		foreach($HTTP_GET_VARS as $key=>$value) $ArrPostAndGet[]=$value;
	}

	//验证开始
	foreach($ArrPostAndGet as $key=>$value){
		if (FunStringExist($value,$ArrFiltrate)){
			echo "<script language=\"javascript\">alert(\"非法字符\");</script>";
			if (emptyempty($StrGoUrl))
				echo "<script language=\"javascript\">history.go(-1);</script>";
			else
				echo "<script language=\"javascript\">window.location=\"".$StrGoUrl."\";</script>";
			exit;
		}
	}
	
?>