/** 
 * Scrolling Nav
 * Function for nav interactions on scroll.
 */
(function($) {

  var ScrollingNav = (function() {
    
    var $body = $('body'),
        scrollDistance = '70',
        scrollThrottle = '350',
        scrollingClass = 'scrolling-down';
      
    return{
      
      init: function() {  
        this.onScrollDown();
      },

      /** 
       * Scrolling Down
       * Throttles scrolling via setInterval
       */
      onScrollDown: function(){
        
        var scrolledDown;

        $(window).scroll(function(){
          scrolledDown = true;
        });

        // Throttle scroll
        setInterval(function() {
          if (scrolledDown) {
            ScrollingNav.hasScrolled();
            scrolledDown = false;
          }
        }, scrollThrottle);
      },   

      /**
       * Has Scrolled
       * Adds and removes scrolling class to body
       */
      hasScrolled: function() {
        var scrolling = $(window).scrollTop();
        (scrolling >= scrollDistance) ? $body.addClass(scrollingClass) : $body.removeClass(scrollingClass);
      },
    };
  })();
ScrollingNav.init();
})(jQuery);

