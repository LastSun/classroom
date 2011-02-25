/**
 * 
 */

$(document).ready(function() {
	$("#bu_search").click(function() {
		$.post("search/search.php",{
			keyword:	cNULL($("#in_keyword").val())
		},function(data) {
			$("#roominform").html(data);
		});
	});
});