

/*----------------------------------------
Sticky Nav - on scroll
------------------------------------------*/
$(window).scroll(function() {
  if ($("header.mast").offset().top > 0) {
        $("header.mast").addClass("sticky")
      } else {
        $("header.mast").removeClass("sticky")
      }
});



/*----------------------------------------
Navigation and Scrolling
------------------------------------------*/
if( $(window).width() < 568 ){
	top_offset = -385;
} else {
	top_offset = -59;			
}

$('header, #copyright, .mobileNav, #mobileNav').localScroll({
	offset: {left: 0, top: top_offset}	
});

$(".scroll_to_top").click(function() {$.scrollTo($("body").position().top, 300)});
$(".js-contact-us").click(function() {$.scrollTo($("body").position().top, 1100)});


/*----------------------------------------
Scroll To Top
------------------------------------------*/
$(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('.scroll_to_top').fadeIn(800);
	} else {
		$('.scroll_to_top').fadeOut();
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
                    }, 2000, 'easeInOutQuad')
            }, 2);
        }

    });


 /*----------------------------------------------   
 -Simple Scroll To Anchor
 -----------------------------------------------  */  	

 	$('.home a.js-scroll-features').on('click',function (e) {
 		    e.preventDefault();
 	
 		    var target = "#sect-features",
 		    $target = $(target);
 	
 		    $('html, body').stop().animate({
 		        'scrollTop': $target.offset().top - 70
 		    }, 800, 'swing');	
 		});
$('.home a.js-scroll-pricing').on('click',function (e) {
	    e.preventDefault();

	    var target = "#sect-pricing",
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top - 70
	    }, 800, 'swing');	
	}); 