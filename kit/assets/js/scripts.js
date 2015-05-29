
/*----------------------------------------------   
--Scripts and Inits
-----------------------------------------------  */ 
(function() {
  $(function() {

 
/*----------------------------------------------   
--Sticky Nav
-----------------------------------------------  */ 
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 70) {
		$("header.header-main").addClass("sticky");
	} else {
		$("header.header-main").removeClass("sticky");
	}
});


/*----------------------------------------------   
-Function Details
-----------------------------------------------  */

    
	});
}).call(this);







