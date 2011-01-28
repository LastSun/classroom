/**
 * 
 */
 var editor = null;
 var q_editor = null;
 var paction = '';
 var naction = '';
 var save_para = false;
 
 note_edit_en = function() {
 	 save_para = true;
 	 naction='update';
	 if(editor) {
	 	if(strcheck_null(editor.getData())) {
	 		if(paction == 'update') save_record('del');
	 		editor.destroy();
	 		q_editor.remove();
	 	}
	 	else
	 	{
	 		save_record(paction);
	 		paction = 'update';
	 		editor.destroy();
	 		q_editor.attr("style","display:block");
	 	}
	 }
	 q_editor = $(this);
	 $(this).ckeditor(function() {},ckeditor_skin);
	 editor = $(this).ckeditorGet();
	//editor = CKEDITOR.replace(this);
	//editor = $(this).ckeditor();
	 paction = naction;
 }
 
 note_edit_close = function() {
 	//alert('click');
 	if(save_para)
 	{
	 	if(editor) {
	 		if(strcheck_null(editor.getData())) {
	 			if(paction == 'update') save_record('del');
	 			editor.destroy();
	 			q_editor.remove();
	 			editor = '';
	 		}
	 		else
	 		{
	 			save_record(paction);
	 			paction = 'update';
	 			editor.destroy();
	 			editor = '';
	 			q_editor.attr("style","display:block");
	 		}
	 	}
	 	save_para = false;
 	}
 }
 
 $('#newrecord').click(function() {
 	save_para = true;
 	naction='newr';
 	if(editor) {
 		if(strcheck_null(editor.getData())) {
 			if(paction == 'update') save_record('del');
 			editor.destroy();
 			q_editor.remove();
 		}
 		else
 		{
 			save_record(paction);
 			paction = 'newr';
 			editor.destroy();
 			q_editor.attr("style","");
 		}
 	}
 	$('#notes').prepend("<div class='note_editor'></div>");
 	q_editor = $('.note_editor:first');
 	q_editor.dblclick(note_edit_en);
 	q_editor.click(note_edit_close);
 	$('.note_editor:first').ckeditor();
 	editor = $('.note_editor:first').ckeditorGet();
 	paction = naction;
 });
 
 //$('body').click(note_edit_close);
 $('.note_editor').click(note_edit_close);
 
 $('.note_editor').dblclick(note_edit_en);
 
 function save_record(act) {
 	classed = q_editor;
 	if(!q_editor.attr('recordid')) act = 'newr';
 	$.post(domain + "API/record.php",{
 		action:		act,
 		record:		editor.getData(),
 		recordid:	q_editor.attr('recordid')
 	},function(data) {
 		if(data == 'OK') classed.removeClass('notsave');
 		else if(data != 'OK')
 		{
 			if(data == '0' || data == 'error' || data == null) classed.addClass('notsave');
 			else classed.attr("recordid",data);
 		}
 	});
 }
 
 function strcheck_null(pstr)
 {
 	str = pstr;
 	if(str.length > 30) return false;
 	str=str.replace("<br />","");
 	str=str.replace("<br>","");
 	str=str.replace("<p>","");
 	str=str.replace("</p>","");
 	str=str.replace("&nbsp;","");
 	str=trim(str);
    if(str=="") return true;
    else return false;
 }
 
 function trim(str){
 	return str.replace(/(^\s*)|(\s*$)/g,"");
 }
   