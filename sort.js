$(document).ready(function(){
 $("#sortable").toggle(
      function () {
	    var asc= 'ASC';
		var desc = 'DESC';
        $(this).css({"background-image":"url(images/desc.gif)"});
      },
      function () {
        $(this).css({"background-image":"url(images/asc.gif)"});
      }
    );
});