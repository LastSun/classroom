<?php

	echo <<< div
	<p>
		<input type="text" id="in_keyword" />
		<input type="button" id="bu_search" value="搜索" />
	</p>
	<p>
		<input type="radio" name="search_type" id="search_type" value="0" checked="checked"> 建筑物 </input>
		<input type="radio" name="search_type" id="search_type" value="1"> 教室 </input>
	</p>
div;
	addjs("search.js");

?>