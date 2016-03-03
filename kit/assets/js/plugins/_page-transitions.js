/*-----------------------------------------
Page Transitions
------------------------------------------*/
(function($) {

  var Pagetrans = {
   
    init: function() {  

      var siteURL = "http://" + top.location.host.toString();
      var transLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../'] ");
      var animationClass = "ani-fade-in-page" ;

      //Remove the fade-in class
      setTimeout(function(){
        $("body").removeClass("fade-in-main");
      },1500);
      

      transLinks.click(function(event){
        event.preventDefault();
        var linkLocation = this.href;
        
        //Redirect Page
        function redirectPage() {
          window.location = linkLocation;
        }

        // Animations before Fade Out
        $(".site-header").animate({
          top: '-=1000'}, {
          duration: 400,
          complete: function() { $("body").fadeOut(700, redirectPage); }
        });
      });

      $(window).unload(function() {
        $(window).unbind('unload');
      });
    
    // iOS Safari
    $(window).bind('pageshow', function(event) {
      if (event.originalEvent.persisted) {
        window.location.reload();
      }
    });

    // Use css keyframes for fades. Remove from body to prevent weird stuff
    setTimeout(function(){
      $("body").removeClass(animationClass);
    },1500);

    }
  };

  Pagetrans.init();

})(jQuery);
