// IIFE - Immediately Invoked Function Expression
(function($, window, document, undefined) {

/*------------------------------------------ 
ON DOC READY (The $ is now locally scoped)
=============================================  */
  $(function() {




  }); // close doc readys
/*-------------------------------------------  
IMMEDIATELY INVOKE
=============================================  */

/*-------------------------------------------   
--Sticky Nav
---------------------------------------------  */ 
var  scrolledDown;

$(window).scroll(function(){
  scrolledDown = true;
});

setInterval(function() {
 if (scrolledDown) {
  hasScrolled();
  scrolledDown = false;
 }
}, 350);

function hasScrolled() {
 var scrollDistance = 70;
 var scrolling = $(window).scrollTop();

 // Scroll-down
 if (scrolling >= scrollDistance) {
  $('body').addClass('scrolling-down');
 } else {
 // Scroll-Up
  $('body').removeClass('scrolling-down');
  }
}


/*---------------------------------------------
Function above mobile
----------------------------------------------*/
if ($(window).width() > 767) {
}


}(jQuery, window, document));  





/*---------------------------------------------
Modernizer Load ex
----------------------------------------------*/
Modernizr.load([
  {
    // The test: does the browser understand Media Queries?
    test : Modernizr.mq('only all'),
    // If not, load the respond.js file
    nope : 'js/respond.js'
  }
]);
