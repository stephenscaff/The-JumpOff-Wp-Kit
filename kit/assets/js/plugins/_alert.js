/*-----------------------------------------
Simple Alerts via data-atts
Author: Stephen Scaff
Dependancies: _alerts.scss
------------------------------------------*/

(function() {
	//trigger alert via data-attribute
	$('.js-alert-trigger').click(function (e) {
		e.preventDefault();
	 $( '#' + $(this).data('alert') ).slideToggle(150);
	 $(this).toggleClass("alert-bar-open");
	 
	 //If has class will-close, slide that badboy out
	 setTimeout(function(){
	    //$('.alert-bar').slideUp(300);
	    $('.alert-bar.will-close').slideUp(300);
	  },2000);
	  
	  //Manual close
	  $('.js-close').click(function(e){
	  		e.preventDefault();
	      $('.alert-bar').slideUp(150);
	  });
	});
})(jQuery);


$('.alert .js-close').click(function (e) {
	e.preventDefault();
	$(this).parent().fadeOut(200);
});
