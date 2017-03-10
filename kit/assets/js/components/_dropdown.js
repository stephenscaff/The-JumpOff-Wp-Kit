/**	
 * Dropdown
 */
function DropDown(el) {
	this.dd = el;
	this.initEvents();
}
DropDown.prototype = {
	initEvents : function() {
		var obj = this;
		obj.dd.on('click', function(event){
			$(this).toggleClass('active');
			event.stopPropagation();
		});	
	}
};
//Init
$(function() {
	var dd = new DropDown( $('.js-dropdown') );
	$(document).click(function() {
		// all dropdowns
		$('.dd-wrap').removeClass('active');
	});
});



/**	
 * Dropdown
 */
$('.js-dropdown').on('click',function(data){
	var $drop = $(this);
	var tagName = $('this, a');
	if(!$drop.hasClass('is-open')){
		$drop.find('ul').css('z-index','10');
		$drop.addClass('is-open');
		var label = $drop.find('.dropdown__label span');
		label.text(label.attr('data-label'));
	} else {
		$drop.removeClass('is-open');
		
		//Get li or a nodes to replace dd label
		if($(data.target)[0].nodeName === 'LI' || $(data.target)[0].nodeName === 'A'){
			$drop.find('.dropdown__label span').text($(data.target).text());
		}
	}
});