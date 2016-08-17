/*----------------------------------------------   
--Global Tabs - used for all tab elements now
@todo: Clean up, make object literal
-----------------------------------------------  */

$('.js-tabs').each(function(){
  var $tabs = $(this);

  $tabs.find('.tab-viewer li').hide();
  $tabs.find('.tab-viewer li:first-child').show();
  $tabs.find('li:first-child').addClass("selected");
    
  $tabs.find('.tab-nav li').on('click', function () {
    $tabs.find('ul.tab-viewer li').addClass('fade-in');
    $tabs.find('.tab-nav li').removeClass("selected");
    $(this).addClass("selected");
    $tabs.find('.tab-viewer li:eq(' + $(this).index() + ')').show().siblings().hide();
    $tabs.find('.viewer-bottom li:eq(' + $(this).index() + ')').show().siblings().hide();
  });
});