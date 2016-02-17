/*-----------------------------------------
Page Transitions
------------------------------------------*/

// Use css keyframes for fades. Remove from body to prevent weird stuff
setTimeout(function(){
  $("body").removeClass("ani-fade-in-page");
},1500);

// Target External Links for transition. Using universal selectors less than awesome, but can't have js links transitioning
var siteURL = "http://" + top.location.host.toString();
var transLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");

// Let's do this
transLinks.click(function(event){
  event.preventDefault();
  var linkLocation = this.href;

  // Redirect Page
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

// Fix pages being blank on back button
$(window).unload(function() {
  $(window).unbind('unload');
});
// iOS Safari
$(window).bind('pageshow', function(event) {
  if (event.originalEvent.persisted) {
    window.location.reload();
  }
});
