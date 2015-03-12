//About team bios Accordion
$(".trigger").click(function() {
$(".trigger").removeClass("active");

var activeTab = $(this).attr("href");

if($(activeTab).is(":visible")) {
$(".team_bio").slideUp().removeClass("is_showing");
$(this).removeClass("active");

} else {
if ($(".is_showing").length > 0) {
$(".is_showing").slideUp(function() {
$(activeTab).hide().slideDown().addClass("is_showing");
} ).removeClass("is_showing");

} else {
$(activeTab).hide().slideDown().addClass("is_showing");
} $(this).addClass("active");
} return false;
});