/*----------------------------------------------   
Expander and Accordions, stupid simple
Author:  Stephen Scaff
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

/*----------------------------------------------   
Accordion: Alt
-----------------------------------------------  */
$(".js-trigger").click(function() {
  $(".js-trigger").removeClass("active");

  var activeTab = $(this).attr("href");

  if ($(activeTab).is(":visible")) {
    $(".content").slideUp().removeClass("is-showing");
    $(this).removeClass("active");
  } else {
    if ($(".is-showing").length > 0) {
      $(".is-showing").slideUp(function() {
        $(activeTab).hide().slideDown().addClass("is-showing");
      }).removeClass("is-showing");
    } else {
      $(activeTab).hide().slideDown().addClass("is-showing");
    }

    $(this).addClass("active");
  }
  return false;
});