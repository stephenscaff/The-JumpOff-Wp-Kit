/*----------------------------------------
Full Viewport fallback
-----------------------------------------*/

$(function() {
  var pause = 100; // will only process code within delay(function() { ... }) every 100ms.

  $(window).resize(function() {
    delay(function() {
      var width = $(window).width();

      if ( width > 776  ) {
        $(".js-height").height($(window).height());

       	$(window).resize(function() {
     	    $(".js-height").height($(window).height());
       	});
      } else if ( width >= 480 && width <= 767 ) {
        // code for mobile landscape
      } else if ( width <= 479 ) {
        // code for mobile portrait
      }
    }, pause );
  });

  $(window).resize();

});

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
