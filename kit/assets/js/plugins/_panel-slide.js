/*----------------------------------------
Contact Panel Slide
------------------------------------------*/
$(".js-panelslide").click(function () {
	$("#js-slide-contact").addClass("absolute");
	$('body,html').animate({
					scrollTop: 0
				}, 500);
				return false;
	}); 

	$(".js-back").click(function () {
	$("#js-slide-contact").removeClass("absolute");
}); 


	scroll = {
		paneOffset : 0,
		learn : {
			call : false,
			current : '',
			init : function(el){
				if (this.current != el) {
					this.reset();
				}
				this.current = el;		
			},
		},

		slidepanel : {
			call : false,
			init : function(){
				el = $('#js-slide-contact');
				l = (!this.call ? 0 : 100);
				this.call = (l == 0 ? true : false);
				el.animate({left:l+'%'}, 950, 'easeInOutCubic');			
			}
		},
};

$(function() { 
// Contact Panel Slide Back
	$('.js-panelslide, .js-back').click(function(){
		scroll.slidepanel.init();
		return false;
	});
});

