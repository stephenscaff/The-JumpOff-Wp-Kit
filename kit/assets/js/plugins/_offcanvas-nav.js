 /*----------------------------------------------   
 --Stupid SImple Offcanvas Nav
 -----------------------------------------------  */ 
 $(".offcanvas-toggle, .siteoverlay").click(function (e) {
   $(".offcanvas-toggle, body").toggleClass("js-nav-open");
   e.preventDefault();
  });
  