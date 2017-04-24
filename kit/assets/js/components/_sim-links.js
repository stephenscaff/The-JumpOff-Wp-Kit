/**
 * Spanizer
 * Wraps letters or words with spans, for css animations
 *
 * @example
  <h1 class="js-letters">Letters</h1>
 */
(function($) {
  var s,
  Spanizers = {
    settings: {
      letters: $('.js-letters'),
      words: $('.js-words'),
    },
    init: function() {
      s = this.settings;
      this.bindEvents();
    },
    bindEvents: function(){
      Spanizers.letters();
      Spanizers.words();
    },

    letters: function(){
      s.letters.html(function (i, el) {
        var spanize = $.trim(el).split(""),
            join = '<span>' + spanize.join('</span><span>') + '</span>';
        return join;
      });
    },

    words: function(){
      s.words.html(function (i, el) {
        var spanize = el.split(" "),
        join = '<span class="oh"><span>' + spanize.join('</span></span> <span class="oh"><span>') + '</span></span>';

        return join;
      });
    },
  };
  Spanizers.init();
})(jQuery);