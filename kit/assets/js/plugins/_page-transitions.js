/*----------------------------------------
Page Transitions
------------------------------------------*/

//Use css keyframes for fades. Remove from body to prevent weird stuff
setTimeout(function(){
 $("body").removeClass("fade-in-page");
},1500);

//Links to cause transition - note, my bad. Clean this up.
//var transLinks = $("a.js-trans, header.header-main a, nav a, .btn:not(.js-open-modal), .btn:not(.btn-ext), .sect-blocks a, .js-grid a, .blog article a, .blog .link-more, .categorey .link-more, .author .link-more, .sect-next a, .sect-mast a.btn");

//Target External Links for transition. Using universal selectors less than awesome, but can't have js links transitioning
var siteURL = "http://" + top.location.host.toString();
var transLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
//Let's do this
transLinks.click(function(event){
 event.preventDefault();
 var linkLocation = this.href;

//Redirect Page
function redirectPage() {
 window.location = linkLocation;
}

//Animations before Fade Out
$("header.header-main").animate({
    top: '-=1000'}, {
    duration: 400,
    complete: function() { $("body").fadeOut(700, redirectPage); }
 });
});
/*
// No animations before page fade out
function fadeBodyOut() {
 $("body").fadeOut(900, redirectPage);
}
*/

