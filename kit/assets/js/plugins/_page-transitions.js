/*----------------------------------------
Page Transitions
------------------------------------------*/
$("body").css("display", "none");

$("body").fadeIn(1500);

$("a.suave, a.btn, nav a, .sect-blocks a").click(function(event){
	event.preventDefault();
	linkLocation = this.href;
	$("body").fadeOut(600, redirectPage);
});

function redirectPage() {
	window.location = linkLocation;
}