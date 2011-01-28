/**
 * 
 */
$(document).ready(function() {
	
	var edit_flag = false;
	$('#ctrl_edit').click(function() {
		if(!edit_flag) {
			editpolyinit();
			edit_flag = true;
		}
		else {
			initialize_map();
			edit_flag = false;
		}
	});
	
	$('#ctrl_save').click(function() {
		editpoly_flag = 1;
		if(last) savepolygon(last);
	});
	
	$('#stcen_dongqu').click(function() {
		map.setCenter(fixlatlng(dongqu));
	});
	
	$('#stcen_xiqu').click(function() {
		map.setCenter(fixlatlng(xiqu));
	});
	
	$('#stcen_nanqu').click(function() {
		map.setCenter(fixlatlng(nanqu));
	});
	
	$('#stcen_beiqu').click(function() {
		map.setCenter(fixlatlng(beiqu));
	});
	
});