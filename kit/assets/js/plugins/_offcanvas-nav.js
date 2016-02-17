/*----------------------------------------------   
  Stupid Simple Offcanvas Nav
-----------------------------------------------*/

$(".js-offcanvas-toggle").click(function (e) {
  $("body").toggleClass("js-nav-open");
  e.preventDefault();
});

// Escape key should remove any site overlays
$(document).keyup(function(e) {
  if ($("body").hasClass("js-nav-open") && e.which === 27) {
    $(".js-nav-open").removeClass("js-nav-open");
  }
});
