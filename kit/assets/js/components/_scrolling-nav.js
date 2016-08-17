/*----------------------------------------   
-Scrolling Nav
-----------------------------------------*/
(function($) {
 
  var scrollingNav = {
    
    init: function() {     

      var scrolledDown;

      $(window).scroll(function(){
        scrolledDown = true;
      });

      setInterval(function() {
        if (scrolledDown) {
          hasScrolled();
          scrolledDown = false;
        }
      }, 350);

      function hasScrolled() {
        var scrollDistance = 70;
        var scrolling = $(window).scrollTop();
        (scrolling >= scrollDistance) ? $('body').addClass('scrolling-down') : $('body').removeClass('scrolling-down');
      }
    },
  };
scrollingNav.init();

})(jQuery);
