 /*jshint -W030*/
 /*globals feature: false */

 /* This script wrapped in a Immediately-Invoked Function Expression (IIFE) to
 * prevent variables from leaking onto the global scope. For more information
 * on IIFE visit the link below.
 * @see http://en.wikipedia.org/wiki/Immediately-invoked_function_expression
 */
(function() {


/*---------------------------------------------
Feature.js - browser feature detection
See http://featurejs.com/ for full API reference
----------------------------------------------*/
$("html").removeClass("no-js");

if (!feature.svg) {
  $("html").addClass("no-svg");
}
if (!feature.cssFlexbox) {
  $("html").addClass("no-flexbox");
}


/*---------------------------------------------
Document
----------------------------------------------*/

/*-- functions above tablet --*/
if ($(window).width() > 767) {}


/*--DOC READY--*/
$(function() { });


})(jQuery);


