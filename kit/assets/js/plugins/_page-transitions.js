/*----------------------------------------
Page Transitions
------------------------------------------*/

//Use css keyframes for fades. Remove from body to prevent weird stuff
setTimeout(function(){
	$("body").removeClass("fade-in-page");
},1500);

//Links to cause transition
var transLinks = $("a.suave, a.btn, nav a, .sect-blocks a");

//Let's do this
transLinks.click(function(event){
	event.preventDefault();
	var linkLocation = this.href;

//Redirect Page
function redirectPage() {
	window.location = linkLocation;
}

//Animations before Fade Out
$(".mobilenav-bg").animate({
    right: '-=1000'}, {
    duration: 400,
    complete: function() { $("body").fadeOut(900, redirectPage); }
	});
});
/*
// No animations before page fade out
function fadeBodyOut() {
	$("body").fadeOut(900, redirectPage);
}
*/

