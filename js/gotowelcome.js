var $j = jQuery.noConflict();
jQuery(document).ready(function(){
	$j(document).keypress(function(event) {
	var ch = String.fromCharCode(event.keyCode || event.charCode);
	switch (ch) {
		case '~': 
		window.location.href = 'http://pcbsglobal.com/luke-new/admin/welcome.php';
		break;
	}
});
}); 
