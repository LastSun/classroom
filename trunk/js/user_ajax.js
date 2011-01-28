/**
 * 
 */

 $('#login').click(function() {
 	$.post(domain + "API/login.php",{
 		username:	$('#username').val(),
 		password:	$('#password').val()
 		},function(data) {
 			$('#login_div').html(data);
 		}
 	);
 });
 
  $('#logout').click(function() {
 	$.post(domain + "API/logout.php",function(data) {
 			$('#login_div').html(data);
 		}
 	);
 });