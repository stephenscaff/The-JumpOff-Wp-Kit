/*global jQuery */
/*jshint unused:false */
/*-------------------------------
 * We Be Scrollin'
 * Version: 1.0
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2015, Stephen Scaff
 * http://stephenscaff.com
 *
 *------------------------------- */
/*------------------------------
* USAGE: init of html
*
$('html').weBeScrollin({
  offset: '0',
  addActive: 'true',
  scrollSpeed: 900,
  scrollEase: 'easeInOutCubic',
  complete : function() {},
});

----------------------------------*/
(function($) {
  $.fn.weBeScrollin = function(options, callback) {
    // Establish our default settings
    var defualts = $.extend({
      offset: '0',
      scrollEase: 'swing',
      scrollSpeed: '700',
      addActive: 'false'
    }, options);
    return this.each(function() {
      $('a[data-scroll]').click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var offset = options.offset;
        var scrollEase = options.scrollEase;
        var scrollSpeed = options.scrollSpeed;
        var addActive = options.addActive;
        var target = ('#' + $(this).data('scroll'));
        var $target = $(target);
        
        //Add active Class
        if (options.addActive) {
          $('a[data-scroll]').removeClass('active');
          if (!$this.hasClass('active')) {
            $this.addClass('active');
          }
        }
								
								//Scroll animation
        $('html, body').stop().animate({
          'scrollTop': $target.offset().top - offset
        }, {
        		// Duration
          duration: options.scrollSpeed,
          // Easing
          easing: options.scrollEase,
          //Complete callback
          complete: options.complete
        });
        
        //Callback
        $.isFunction( options.setup );
      });
    });
  };
}(jQuery));

/*
----------------------------------------------   
--Load then scroll to hash
----------------------------------------------- 
	setTimeout(function() {
	 $('html, body').scrollTop(0).show();
	 $('html, body').animate({
	   //how about a touch of offset, cause I'm rockin' a fixed nav
	   scrollTop: $(window.location.hash).offset().top-60
	     }, 1200, 'swing');
	     }, 100);
	}
	*/