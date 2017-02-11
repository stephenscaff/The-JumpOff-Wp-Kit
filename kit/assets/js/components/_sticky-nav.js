/**
 * Basic Sticky Nav Element
 *
 */
(function($) {
 
  var stickyNav = {
    
    init: function() {     

      var $subNav = $(".js-sticky");
      var subNavHeight = $subNav.outerHeight();
      //var stickyStart = ($subNav.offset() || { "top": NaN }).top;
      var stickyStart = $subNav.offset().top - 100;

    $(document).on( 'scroll resize', $subNav, function(){
      $subNav.parent().height(subNavHeight);
      var pos = $(document).scrollTop();
      if (pos >= stickyStart) {
        $subNav.addClass("is-sticky");
      }
      else {
        $subNav.removeClass("is-sticky");
      }
    });

  },
};

if($(".js-sticky").length) { 
  stickyNav.init();
}

})(jQuery);
