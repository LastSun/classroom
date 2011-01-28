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
	
?>