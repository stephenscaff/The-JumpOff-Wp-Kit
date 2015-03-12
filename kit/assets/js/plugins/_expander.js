/*----------------------------------------------   
Expand
-stupid simple
-----------------------------------------------  */
$('.js-expander').click(function (e) {
	e.preventDefault();
 $( '#' + $(this).data('expander') ).slideToggle(150);
 $(this).toggleClass("expander-open");
});


/*----------------------------------------------   
Expand: accordion
-----------------------------------------------  */
function accordion() {

  var accordionOpen = $('[data-accordion] .js-open');
  
  accordionOpen.click(function() {

    accordionOpen.removeClass("is-open");
    $('[data-accordion] .content').slideUp();

    if (!$(this).next().is(":visible")) {
      $(this).next().slideDown().prev(accordionOpen).toggleClass("is-open");

    }
    return false;
  });
}
accordion();