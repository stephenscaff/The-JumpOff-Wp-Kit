 /*----------------------------------------------   
 --Off Canvas Mobile Nav
 -----------------------------------------------  */ 
 $(".toggle-offcanvas, .siteoverlay").click(function (e) {
   $(".toggle-offcanvas, body").toggleClass("js-nav-open");
   e.preventDefault();
  });
  