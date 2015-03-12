/*----------------------------------------
Drop Down - Blog Cats
------------------------------------------*/

$("#blognavs").sticky({topSpacing:65});

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
}

$(function() {
	var dd = new DropDown( $('.js-dropdown-cats') );
	$(document).click(function() {
		// all dropdowns
		$('.wrapper-dropdown').removeClass('active');
	});
});
