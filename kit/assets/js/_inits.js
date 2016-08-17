/*jshint -W030*/
/*globals feature: false */

/*---------------------------------------------
SITE INITS
@description: pattern for initializing our plugins and modules,
              via the object literal 'site'
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