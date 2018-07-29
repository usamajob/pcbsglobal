$(document).ready(function(){
 $("#sortable").toggle(
      function () {
        $(this).css({"background-image":"url(images/desc.gif)"});
      },
      function () {
        $(this).css({"background-image":"url(images/asc.gif)"});
      }
    );
});