/*----------------------------------------   
-Expander
Simple Expander made reuseable via data attributes
-----------------------------------------*/
(function($) {
  var expandIt = { 

    init: function() {
      this.link = $('.js-expand');
      this.bindEvents();
    },
    bindEvents: function() {
      this.link.on('click', $.proxy(this.handleClick, this));
    },

    handleClick: function(e) {
      e.preventDefault();
      $( '#' + $(this.link).data('expander') ).slideToggle(400);
    },
  };
  expandIt.init();
})(jQuery);

