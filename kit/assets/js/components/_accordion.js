/*----------------------------------------   
-Expander
Simple Expander made reuseable via data attributes
-----------------------------------------*/
(function($) {
  var s,
  accordionIt = {

    settings: {
      accordionLink: $('.js-accordion'),
      content: $('.accordian__content'),
    },

    init: function(){
      s = this.settings;
      this.bindEvents();
    },

    bindEvents: function() {
      s.accordionLink.click(function(e) {
        e.preventDefault();
        accordionIt.openAccordian();
        if (!$(this).next().is(":visible")) {
          $(this).next().slideDown().prev(s.accordionLink);
        }
      });
    },

    openAccordion: function() {
        s.content.slideUp();
        return false;
    },
  };
  accordionIt.init();
})(jQuery);