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
};



/**
 * Doc ready them inits
 */
$(function(){
  // Feature JS
  site.featureJS();
  // Plax
  if($('.js-parallax').length){
    site.plax();
  }
});