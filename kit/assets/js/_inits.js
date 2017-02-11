/*jshint -W030*/
/*globals feature: false */

/* This script wrapped in a Immediately-Invoked Function Expression (IIFE) to
 * prevent variables from leaking onto the global scope. For more information
 * on IIFE visit the link below.
 * @see http://en.wikipedia.org/wiki/Immediately-invoked_function_expression


/*---------------------------------------------
INit Mixitup
----------------------------------------------*/
var site = {
      
  /*---------------------------------------------
  Feature JS
  ----------------------------------------------*/
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

  /*---------------------------------------------
  Parallax
  ----------------------------------------------*/
  plax: function(){
    $('.js-parallax').parallax(6, 'false');
  },
};

/*---------------------------------------------
INITS (doc ready)
----------------------------------------------*/
$(function(){
  // Feature JS
  site.featureJS();
  // Plax
  if($('.js-parallax').length){
    site.plax();
  }
});
