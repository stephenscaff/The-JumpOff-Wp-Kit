/**
 * Dropdown
 * A simple dropdown that also replaces a label with selected node. 
 */

 var DropItDown = (function() {
    
  var $dropDown = $('.js-dropdown'),
  isOpen = 'is-open',
  tagName = $('this, a'),
  label = $(this).find('.dropdown__label span');

  return {
   
    /**
     * Init Popups
     */
    init: function() {
      this.toggleDrop();
    },

    /**
     * Toggle Drop
     */
    toggleDrop: function(){
      
      $dropDown.on('click',function(data){
				
				if(!$(this).hasClass(isOpen)){
					
					$(this).find('ul').css('z-index','10');
					$(this).addClass(isOpen);
					label.text(label.attr('data-label'));
				
				} else {
					
					$(this).removeClass(isOpen);
	
					//Get li or a nodes to replace dd label
					if($(data.target)[0].nodeName === 'LI' || $(data.target)[0].nodeName === 'A'){
						// @todo - figure out why label loses scope here
						$(this).find('.dropdown__label span').text($(data.target).text());
					}
				}
			});
    },
  };
})();
DropItDown.init();