/*----------------------------------------------   
-Parallax
-init of div id #mast-bg
-----------------------------------------------  */
(function() {
  var lastScrollY = 0,
      ticking = false,
      bgElm = document.getElementById('mast-bg'),
      speedDivider = 2;

  // Update background position
  var updatePosition = function() {
    var translateValue = lastScrollY / speedDivider;

    // We don't want parallax to happen if scrollpos is below 0
    if (translateValue < 0)
      translateValue = 0;

    translateY(bgElm, translateValue);

    // Stop ticking
    ticking = false;
  };

  // Translates an element on the Y axis using translate3d to ensure
  // that the rendering is done by the GPU
  var translateY = function(elm, value) {
    var translate = 'translate3d(0px,' + value + 'px, 0px)';
    elm.style['-webkit-transform'] = translate;
    elm.style['-moz-transform'] = translate;
    elm.style['-ms-transform'] = translate;
    elm.style['-o-transform'] = translate;
    elm.style.transform = translate;
  };

  // This will limit the calculation of the background position to
  // 60fps as well as blocking it from running multiple times at once
  var requestTick = function() {
    if (!ticking) {
      window.requestAnimationFrame(updatePosition);
      ticking = true;
    }
  };

  // Update scroll value and request tick
  var doScroll = function() {
    lastScrollY = window.scrollY;
    requestTick();
  };

  // Initialize on domready
  (function() {
    var loaded = 0;
    var bootstrap = function() {
      if (loaded) return;
      loaded = 1;

      rafPolyfill();
      window.onscroll = doScroll;
    };

    if ( document.readyState === 'complete' ) {
      setTimeout( bootstrap );
    } else {
      document.addEventListener( 'DOMContentLoaded', bootstrap, false );
      window.addEventListener( 'load', bootstrap, false );
    }
  })();

  // RequestAnimationFrame polyfill for older browsers
  var rafPolyfill = function() {
    var lastTime, vendors, x;
    lastTime = 0;
    vendors = ["webkit", "moz"];
    x = 0;
    while (x < vendors.length && !window.requestAnimationFrame) {
      window.requestAnimationFrame = window[vendors[x] + "RequestAnimationFrame"];
      window.cancelAnimationFrame = window[vendors[x] + "CancelAnimationFrame"] || window[vendors[x] + "CancelRequestAnimationFrame"];
      ++x;
    }
    if (!window.requestAnimationFrame) {
      window.requestAnimationFrame = function(callback, element) {
        var currTime, id, timeToCall;
        currTime = new Date().getTime();
        timeToCall = Math.max(0, 16 - (currTime - lastTime));
        id = window.setTimeout(function() {
          callback(currTime + timeToCall);
        }, timeToCall);
        lastTime = currTime + timeToCall;
        return id;
      };
    }
    if (!window.cancelAnimationFrame) {
      window.cancelAnimationFrame = function(id) {
        clearTimeout(id);
      };
    }
  };

}).call(this);




/* 
	jquery ParaScroll - Parallax scrolling with CSS3 acceleration

	Copyright (C) 2014 jsguy

	MIT Licensed http://en.wikipedia.org/wiki/MIT_License
*/
(function ($) {
	$.fn.parascroll = $.fn.parascroll || function(options) {
		//	What selector to use when finding scrollable elements
		options = $.extend({ scrollable: '.scrollable' }, options);

		//	Check user agent for some capabilities
		var ua = navigator.userAgent,
			//	Grab the transform to use
			//	http://stackoverflow.com/questions/7212102/detect-with-javascript-or-jquery-if-css-transform-2d-is-available
			getTransform = function() {
				var prefixes = 'transform WebkitTransform MozTransform OTransform msTransform'.split(' ');
				for(var i = 0; i < prefixes.length; i++) {
					if(document.createElement('div').style[prefixes[i]] !== undefined) {
						return prefixes[i];
					}
				}
				return false;
			},
			transform = getTransform(),
			//	Force 2d on IE9, no way to feature detect, and run on above IE6 and non-mobile
			force2d = ua.match(/msie 9/i),
			run = !(ua.match(/msie 6/i) || ua.match(/mobile/i));
			scrollItems = [],
			scrollHandler = null,
			
			//	Create a scrollable
			Scrollable = function($el) {
				// set up some vars for caching values throughout
				$el = $($el);
					
				var $para = $el.find(options.scrollable),
					elTop = $el.offset().top,
					maxOffset = [],
					height = $el.height();

				// the actual parallax moving function
				function refresh(docScrollY) {
					$para.each(function (idx, $pEl) {
						var offset, translate;
						$pEl = $($pEl);
						// offset is the document scroll minus the top of the current $el
						// divided by the $el's height multiplied by the maximum offset.
						offset = -Math.round(((docScrollY - elTop) / height) * maxOffset[idx]);
						offset = Math.max(offset, maxOffset[idx]);

						translate = force2d ?
							'translateY(' + offset + 'px)':
							'translate3d(0px,' + offset + 'px, 0px)';

						if (transform && translate) {
							$pEl.css(transform, translate);
							$pEl.css('transform', translate);
						} else {
							$pEl.css('marginTop', offset + 'px');
						}
					});
				};

				//	Maximum offset is the height of the element minus the height of the parallax background + 2px
				$para.each(function (idx, item) {
					maxOffset.push(height - $(item).height() + 2);
				});

				//	Expose refresh
				return { 'refresh': refresh };
			},

			//	Update scrollable items
			updateScrollable = function() {
				var docScrollY = $(window).scrollTop();
				$.each(scrollItems, function(idx, item){
					item.refresh(docScrollY);
				})
			},

			//	Add a parralax item
			addParallax = function(node) {
				scrollItems.push(new Scrollable(node));
				if (!scrollHandler) {
					scrollHandler = true;
					$( window ).scroll(updateScrollable);
				}
			};

		if (run) {
			//  Find all parallax items
			this.each(function (idx, item) {
				addParallax(item);
			});

			// Load in the coordinates of the parallax pieces when the document loads
			updateScrollable();
		}
	};
}(window.jQuery));
