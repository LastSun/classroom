<?php

	echo <<< div
	<p>
		<input type="text" id="in_keyword" />
		<span id="bu_search" class="button">搜索</span>
	</p>
	<p>
		<input type="radio" name="search_type" id="search_type" value="0" checked="checked"> 建筑 </input>
		<input type="radio" name="search_type" id="search_type" value="1"> 教室 </input>
	</p>
div;
	addjs("search.js");

?>