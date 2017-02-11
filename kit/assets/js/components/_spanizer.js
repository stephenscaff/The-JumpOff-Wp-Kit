/**
 * Spanizer
 * Wraps letters with spans, for css animations
 *
 * @example
  <h1 class="js-letters">Letters</h1>
 */
(function($) {
  var s,
  spanizeLetters = {
    settings: {
      letters: $('.js-letters'),
    },
    init: function() {
      s = this.settings;
      this.bindEvents();
    },
    bindEvents: function(){
      s.letters.html(function (i, el) {
        //spanizeLetters.joinChars();
        var spanizer = $.trim(el).split("");
        return '<span>' + spanizer.join('</span><span>') + '</span>';
      });
    },
  };
  spanizeLetters.init();
})(jQuery);