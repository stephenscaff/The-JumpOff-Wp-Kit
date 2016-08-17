/*----------------------------------------   
-Scroll Direction
-----------------------------------------*/
function scrollDirection(){
  // Hide Header on on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var scrollDistance = 25;
  //var navbarHeight = $('.site-header').outerHeight();
  var navbarHeight = 24;

  $(window).scroll(function(){
    didScroll = true;
  });

  function hasScrolled() {
    var st = $(this).scrollTop();

    if(Math.abs(lastScrollTop - st) <= scrollDistance) {
      return;
    }
    if (st > lastScrollTop && st > navbarHeight){
      $('body').removeClass('scrolling-up').addClass('scrolling-down');
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
        $('body').removeClass('scrolling-down').addClass('scrolling-up'); 
      }
      if(st === 0) {
        $('body').removeClass('scrolling-down').removeClass('scrolling-up'); 
      }
    }
  lastScrollTop = st;
  }

  setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
  }, 250);
}
scrollDirection();