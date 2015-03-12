
/*----------------------------------------------   
--Mobile Nav
-----------------------------------------------  */ 
$("#trigger-nav, .closed, .siteoverlay").click(function (e) {
  $("main, header, nav, #trigger-nav, footer, .siteoverlay").addClass("js-nav-open");
  e.preventDefault();
 });