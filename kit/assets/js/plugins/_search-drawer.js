/*----------------------------------------------   
--Offcanvas Search Drawer
-----------------------------------------------  */ 
$(".icon-search, #js-close-search").click(function (e) {
  $(".search-drawer").toggleClass("js-open-search");
  $("#search-site").focus();
  e.preventDefault();
 });
 //close on escape 
$(".search-drawer").on( 'keydown', function ( e ) {
  if ( e.keyCode === 27 ) { // ESC
      $(".search-drawer").removeClass("js-open-search");
  }
}); 
