/**
 * Dropdown
 * Dropdown with support for labels that swap ou
 * on selection.
 *
 *  @todo	Clean up, make object literal
 *	@example
 		<div class="dropdown js-dropdown">
    	<span class="dropdown__caret"></span>
     	<nav>
	      <ul>
	       <li class="dropdown__label"><span data-label="View by Category">Select Category</span></li>
	       <li class="filter" data-filter="all">All</li>
	       <?php echo  jumpoff_filter_items('resource-types'); ?>
	      </ul>
     	</nav>
    </div>
 */
$('.js-dropdown').on('click',function(data){
	var $drop = $(this);
	var tagName = $('this, a');
	if(!$drop.hasClass('is-open')){
		$drop.find('ul').css('z-index','10');
		$drop.addClass('is-open');
		var label = $drop.find('.label span');
		label.text(label.attr('data-label'));
	} else {
		$drop.removeClass('is-open');
		
		//Get li or a nodes to replace dd label
		if($(data.target)[0].nodeName === 'LI' || $(data.target)[0].nodeName === 'A'){
			$drop.find('.label span').text($(data.target).text());
		}
	}
});
