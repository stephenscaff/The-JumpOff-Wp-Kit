/*----------------------------------------
Stupid Simple Modals
Author: Stephen Scaff
-----------------------------------------*/

$(function() {

  var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
  var modalBoxOverlay = (".modal-box, .modal-overlay");
  var removeOverlay = $(".modal-overlay").remove();

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
	});  
  
  //close link
  $(".js-modal-close").click(function(e) {
  e.preventDefault();
     $(modalBoxOverlay).fadeOut(500, function() {
      removeOverlay();
    });
  });
  //click anywhere to close appended overlay
  $("body").on('click', '.modal-overlay', function(){
    $(modalBoxOverlay).fadeOut(500, function() {
      removeOverlay();
    });
  });
  //Close on control c for copy to clipboard close
  $("input").bind('copy', function() {
    $(modalBoxOverlay).fadeOut(500, function() {
      removeOverlay();
    });
  });
   
  $(window).resize();

});
