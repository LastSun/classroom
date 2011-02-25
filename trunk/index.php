<?php
	session_start();
	include 'configure.php';
	
	htmlhead();
	
	echo <<< link
		<link type="text/css" href="css/index.css" rel="stylesheet" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="$domain/js/googlemap.js"></script>
		<script type="text/javascript" src="$domain/js/control_map.js"></script>
link;

	addjs("index.js");

	htmlheadend();
	
?>
	    
		<div id="left">
			<div id="logo"></div>
			<div id="leftdown">
				<div id="div_search">
					<p>
						<input type="text" id="in_keyword" />
						<input type="button" id="bu_search" value="搜索" />
					</p>
				</div>
				<div id="roominform"></div>
			</div>
		</div>
		<div id="map_canvas"></div>
		<div id="pannel">
			<div id="select_position">
				<a id="stcen_dongqu" class="button">东区</a>
				<a id="stcen_xiqu" class="button">西区</a>
				<a id="stcen_nanqu" class="button">南区</a>
				<a id="stcen_beiqu" class="button">北区</a>
			</div>
			<div id="control">
				<a id="ctrl_edit" class="button">编辑</a>
				<a id="ctrl_save" class="button">保存</a>
			</div>
			<div id="mouseplacename"></div>
		</div>
		<div id="inform"></div>
<?php 
	htmltail();
?>