/*jshint -W030*/
/*globals feature: false */

/**
 * Global Site inits
 */
var site = {
  
  /**
   * Featured Init
   */
  featureJS: function(){
    //no-js 
    $("html").removeClass("no-js");
    //no-svg 
    if (!feature.svg) {
      $("html").addClass("no-svg");
    }
    //no-flexbox 
    if (!feature.cssFlexbox) {
      $("html").addClass("no-flexbox");
    }
  },
  /**
   * Laxy Load
   * @see js/vendor/_unveil.js
   */
  plax: function(){
    $('.js-parallax').parallax(6, 'false');
  },
  /**
   * Laxy Load
   * @see js/vendor/_unveil.js
   */
  lazy: function(){
    $(".js-lazy").unveil(10, function() {
      $(this).load(function() {
        //this.style.opacity = 1;
        //$(this).parent().addClass('loaded');
        //$(this).fadeOut(0).fadeIn(400);
      });
    });
  },
};



/**
 * Doc ready them inits
 */
$(function(){
  // Feature JS
  site.featureJS();
  // Lazy Loader
  if($('.js-lazy').length){
    site.lazy();
  }
});