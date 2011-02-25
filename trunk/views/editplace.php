<?php
/*
 * 编辑地点表单,包含建筑物名称及室内房间编辑
 */
	session_start();
	
	include '../configure.php';

	htmlhead("编辑建筑");
	htmlheadend();

	$query = "select * from places where placeid = $_GET[placeid]";
	$result = mysql_query($query);
	if(!($row = mysql_fetch_array($result)))
		die("database error</body></html>");
	
	echo <<< form
	<script type="text/javascript" src="$jslib/editplace_script.js"></script>
	<p>中文全称：<input type="text" id="placename" name="placename" value="$row[placename]" /></p>
	<p>英文全称：<input type="text" id="placeenname" name="placeenname" value="$row[placeenname]" /></P>
	<p><input id="submit_name" type="submit" name="submit" value="确定" /><span id="s_name_data" class="info_data"></span></p>
	<input type="hidden" id="placeid" name="placeid" value="$_GET[placeid]" />
	<input type="hidden" name="action" value="update" />
form;

	echo <<< editroom
	<hr />
	<div id="addinit">
		<p style="display:none;">
			<label for="roomfloor">楼层:</label><input size="2" type="text" name="roomfloor" id="roomfloor" />
			<label for="roomstart">房间号:</label><input size="5" type="text" name="roomstart" id="roomstart" /> - <input size="5" type="text" name="roomend" id="roomend" />
			<input type="button" id="addinit_button" value="增加" />
			<span id="s_room_data" class="info_data"></span>
		</p>
	
		<table>
			<tr>
				<td>楼层</td>
				<td>房间号</td>
				<td>房间名</td>
				<td>用途</td>
				<td>联系人</td>
				<td>电话号码</td>
				<td></td>
			</tr>
			<tr>
				<td><input size="2" type="text" name="floor" id="floor" /></td>
				<td><input size="5" type="text" name="roomnum" id="roomnum" /></td>
				<td><input type="text" name="roomname" id="roomname" /></td>
				<td><input type="text" name="roomuse" id="roomuse" /></td>
				<td><input type="text" name="roomuser" id="roomuser" /></td>
				<td><input type="text" name="roomcontact" id="roomcontact" /></td>
				<td><input type="button" name="add" id="addroom" value="增加" /></td>
			</tr>
		</table>
	</div>
	<div id="adddiv">
	</div>
	<div id="roominfo">
	</div>
editroom;
	
	htmltail();
?>