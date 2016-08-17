/*-----------------------------------------
Page Transitions
@todo: refactor all of this
------------------------------------------*/
(function($) {

  var pageTrans = {

    init: function(){
      // Target internal links
      var siteURL = "http://" + top.location.host.toString();
      var transLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
      var noTransLinks = transLinks.not('.no-trans');

      //Remove animation class to prevent webkit bugs
      setTimeout(function(){
        $("body").removeClass("ani-fade-in-page");
      },5100);

      transLinks.click(function(e){
        // Allow cmd click new tab
        if (e.metaKey || e.ctrlKey) return;
        if (e.metaKey || e.shiftKey) return;
        
        e.preventDefault();
        var linkLocation = this.href;
         function redirectPage() {
          window.location = linkLocation;
        }
        // Is Exiting
        $("body").addClass('is-exiting');
        //Out animation 
        $(".site-menu, main").animate({
          //right: '-=2500'
          opacity: '0'}, {
          duration: 600,
          complete: function() { $("body").fadeOut(600, redirectPage); }
        });   
      });

      // Fix back button
      $(window).unload(function() {
        $(window).unbind('unload');
      });
    
    // iOS Safari
    $(window).bind('pageshow', function(e) {
      if (e.originalEvent.persisted) {
        window.location.reload();
      }
    });
    },
  };
  pageTrans.init();
})(jQuery);
