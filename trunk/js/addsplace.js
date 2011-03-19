/**
 * 
 */

function addadd(pos)
{
	var marker = new google.maps.Marker({
		position:	pos,
		clickable:	true,
		map:		map
	});
	
	$.post("model/addadds.php",{
		pos:	pos.toString()
	});
}