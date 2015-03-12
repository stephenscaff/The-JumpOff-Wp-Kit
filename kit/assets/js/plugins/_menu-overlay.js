/*----------------------------------------
Menu Overlay
------------------------------------------*/
(function() {
  var triggerBttn = document.getElementById('js-toggle-mobilemenu'),
    overlay = document.querySelector('.mobilemenu-bg'),
    closeBttn = overlay.querySelector('.js-close-mobilemenu');
  transEndEventNames = {
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'msTransition': 'MSTransitionEnd',
      'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
    support = {
      transitions: Modernizr.csstransitions
    };

function toggleOverlay() {
    if (classie.has(overlay, 'js-open-mobilemenu')) {
      classie.remove(overlay, 'js-open-mobilemenu');
      classie.add(overlay, 'close');
      var onEndTransitionFn = function(ev) {
        if (support.transitions) {
          if (ev.propertyName !== 'visibility') return;
          this.removeEventListener(transEndEventName, onEndTransitionFn);
        }
        classie.remove(overlay, 'close');
      };
      if (support.transitions) {
        overlay.addEventListener(transEndEventName, onEndTransitionFn);
      } else {
        onEndTransitionFn();
      }
    } else if (!classie.has(overlay, 'close')) {
      classie.add(overlay, 'js-open-mobilemenu');
    }
    event.preventDefault();
  }
  
  $("#js-toggle-mobilemenu").click(function (e) {
    $(".sect-mobilemenu").toggleClass("js-open-mobilemenu");
    e.preventDefault();
   });
   
/*----------------------------------------
--	Close via Escape key
------------------------------------------*/
 $(triggerBttn).keydown(function(e) {
   if (e.keyCode == 27) {
     if ($('.mobilemenu-bg').hasClass('js-open-mobilemenu')) {
       $('.js-close-mobilemenu').trigger('click');
     }
   }
 });
 triggerBttn.addEventListener('click', toggleOverlay);

})();
