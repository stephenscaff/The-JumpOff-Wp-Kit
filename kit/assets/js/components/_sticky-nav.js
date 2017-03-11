/**
 * Basic Sticky Nav
 * Used interval to reduce number of times our scroll event fires.
 */
(function($) {

  var StickyNav = (function() {

    var $stickyNav = $(".js-sticky");
    
    if ($stickyNav.length) {
      var stickyNavHeight = $stickyNav.outerHeight(),
        stickyStart = $stickyNav.offset().top - 100,
        didScroll = false,
        scrollInterval = '1500';
    }
    
    return{
      
      init: function() {
        this.doScroll();
      },

      /**
       * Do our sticky login
       */
      doScroll: function(){
        
        // Make didScroll true
        $(window).scroll(function() {
          didScroll = true;
        });
        
        // Set Interval so we're no triggering
        // the scroll event non stop
        setInterval(function() {
        
          if ( didScroll ) {
            didScroll = false;
            
            $(window).on( 'scroll', $stickyNav, function(){
              console.log('triggering');
              // Set height of stickynav
              $stickyNav.parent().height(stickyNavHeight);

              var pos = $(window).scrollTop();
              
              // Add & Remove our sticky class
              if (pos >= stickyStart) {
                $stickyNav.addClass("is-sticky");
              } else {
                $stickyNav.removeClass("is-sticky");
              }
            });
          }
        }, scrollInterval);
      },
    };
  })();
  
  if($(".js-sticky").length) { 
    StickyNav.init();
  }
})(jQuery);
