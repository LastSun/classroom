/**
 * 
 */

$(document).ready(function() {
	$("#addinit_button").click(function() {
		html = '<table><tr><td>楼层</td><td>房间号</td><td>房间名</td><td>用途</td><td>联系人</td><td>电话号码</td><td></td></tr>';
		for(i=$("#roomstart").val();i<=$("#roomend").val();i++)
			html += '<tr><td><input value="' + $("#roomfloor").val() + '" readonly="readonly" size="2" type="text" name="roomfloor" id="roomfloor" /></td><td><input size="5" value="' + i + '" readonly="readonly" type="text" name="roomnum" id="roomnum" /></td><td><input type="text" name="roomname" id="roomname" /></td><td><input type="text" name="roomuse" id="roomuse" /></td><td><input type="text" name="roomuser" id="roomuser" /></td><td><input type="text" name="roomcontact" id="roomcontact" /></td><td><input type="button" name="add" id="addroom" value="增加" /></td></tr>';
		html += '</table>';
		$("#adddiv").html(html);
	});
	
	$("#addroom").click(function() {
		$.post("../model/saveroom.php",{
			roomnum:	cNULL($("#roomnum").val()),
			roomname:	cNULL($("#roomname").val()),
			usetext:	cNULL($("#roomuse").val()),
			users:		cNULL($("#roomuser").val()),
			contact:	cNULL($("#roomcontact").val()),
			placeid:	cNULL($("#placeid").val()),
			floor:		cNULL($("#floor").val())
		},function(data) {
			if(data=="OK")
			{
				freshinfo();
				$("#roomnum").val(Number($("#roomnum").val())+1);
			}
			else $("#s_room_data").html(data);
		});
	});
	
	$("#submit_name").click(function() {
		$.post("../model/saveplace.php",{
			placename:		cNULL($("#placename").val()),
			placeenname:	cNULL($("#placeenname").val()),
			placeid:		cNULL($("#placeid").val()),
			action:			'update'
		},function(data) {
			$("#s_name_data").html(data);
		});
	});
	
	freshinfo();
});

function freshinfo() {
	$.post("../model/getroom.php",{
		placeid:	$("#placeid").val()
	},function(data) {
		$("#roominfo").html(data);
	});
}