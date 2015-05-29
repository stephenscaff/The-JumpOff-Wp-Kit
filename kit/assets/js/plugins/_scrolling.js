/*----------------------------------------
Sticky Nav - on scroll
------------------------------------------*/
$(window).scroll(function() {
  //Scroll Top
  var scroll = $(window).scrollTop();

  if (scroll >= 30) {
    //Sticky Nav Deal -Add classes
    $("header.header-main").addClass("sticky").addClass(
      "fade-down");
    $(".mobile-nav-toggle").addClass("sticky");
  } else {
    //Sticky nav - remove class
    $("header.header-main").removeClass("sticky").removeClass(
      "fade-down");
    $(".mobile-nav-toggle").removeClass("sticky");
  }
});


/*----------------------------------------
Scroll to anchor on new page load
------------------------------------------*/
$(document).ready(function() {

 if (window.location.hash) {
		setTimeout(function() {
			$('html, body').scrollTop(0).show();
			$('html, body').animate({
		
		scrollTop: $(window.location.hash).offset().top-50
				}, 2000, 'easeInOutQuad');
			}, 2);
		}
});
	
/*----------------------------------------------   
-Disable hovers on scroll
-----------------------------------------------  */
    var body = document.body,
      timer;
    window.addEventListener('scroll', function() {
      clearTimeout(timer);
      if (!body.classList.contains('disable-hover')) {
        body.classList.add('disable-hover');
      }
      timer = setTimeout(function() {
        body.classList.remove('disable-hover');
      }, 100);
    }, false);
