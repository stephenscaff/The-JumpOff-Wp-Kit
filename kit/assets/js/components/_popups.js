/*---------------------------------------------
PopUps

@version: 1.2 (added aria support)
@description: 
For stuff like modals and popups. 
Uses data atts to support multiple unique instances.

@see: scss/components
@useage:  
  link: <a href="" data-popup="modal-popup">Poppin and Rockin</a>
  el to pop: <article id="modal-popup">Rock it don't stop</article>
----------------------------------------------*/
(function($) {
  var s,
  popUps = {

    settings: {
      popupLink: $('[data-popup]'),
      popupData: $('[data-popup]').data('popup'),
      popup: $('.popup'),
      closer: $('.js-close-popup'),
      input: $('input'),
      isOpen: 'popup--is-open',
    },

    init: function(){
      s = this.settings;
      this.bindEvents();
    },

    bindEvents: function() {
      s.popupLink.click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        popUps.openPopup();
        s.closer.focus();
      });

      s.closer.click(function(e) {
        e.preventDefault();
        popUps.closePopup();
      });

      // Close on ctrl c
      s.input.bind('copy', function() {
        popUps.closePopup();
        s.popupLink.focus();
      });

      // Close on escape
      $(document).keyup(function(e) {
        if ($('body').hasClass(s.isOpen) && e.which === 27) {
          popUps.closePopup();
           s.popupLink.focus();
        }
      });
      // Close if clicked anywhere
      $('body').click(function() {
        if ($('body').hasClass(s.isOpen)) {
          popUps.closePopup();
          s.popupLink.focus();
        }
      });
    },

    openPopup: function() {
      $('#'+s.popupData).addClass(s.isOpen);
      $('body').addClass(s.isOpen);
      s.popup.attr('aria-hidden', 'false'); //@since v1.2
    },
    closePopup: function() {
      $('#'+s.popupData).removeClass(s.isOpen);
      $('body').removeClass('popup--is-open');
      s.popup.attr('aria-hidden', 'true'); //@since v1.2
    },
  };
  if($("[data-popup]").length) {  
    popUps.init();
  }
})(jQuery);