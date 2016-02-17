/*----------------------------------------   
--Sticky Nav scrolling
-----------------------------------------*/

var scrolledDown;

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
