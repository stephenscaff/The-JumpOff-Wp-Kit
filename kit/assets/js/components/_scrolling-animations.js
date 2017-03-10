/**
 * Scrolling Animations (Waypoints component)
 */
(function($) {

    var scroller = {
      init: function(trigger) { 

        $('[data-scroll]').each( function() {
          var osElement = $(this),
              osAnimationClass = $(this, ['data-scroll']),
              osAnimationDelay = $(this, ['data-scroll-delay']);
       
          osElement.css({
              '-webkit-animation-delay':  osAnimationDelay,
              '-moz-animation-delay':     osAnimationDelay,
              'animation-delay':          osAnimationDelay
          });
       
          var osTrigger = ( trigger ) ? trigger : osElement;
       
          osTrigger.waypoint(function() {
              osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '90%'
          });
        });
  },
};
 scroller.init();
})(jQuery);