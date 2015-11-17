/*----------------------------------------
Simple Drop Down
Author: Stephen Scaff
------------------------------------------*/
//Setup
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
