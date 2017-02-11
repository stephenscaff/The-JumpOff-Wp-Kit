/**
 * Tabbies
 * Stupid simple global, flexible, and resuable tab system that alows for multiple tabs on the 
 * same page, with identical markup/classes. Uses css keyframes for the all sexy
 * like fade ins.
 *
 * @author: Stephen Scaff
 * @version: 2.1.0
 * @see: assets/scss/_tabs.scss
 */
(function($) {
  var s, Tabbies = {
    settings: {
      tabWrap    : $('.js-tabs'),
      tabViewer  : ('.tabs__viewer li'),
      tabNav     : ('.tabs__nav li'),
    },
    init:function() {
      s = this.settings;
      this.doTabs();
    },
    doTabs:function() {
      s.tabWrap.each(function(){
        var $tabs = $(this);
        //var tabViewer = ('.tabs__viewer li');
        //var tabNav = ('.tabs__nav li');

        $tabs.find(s.tabViewer).hide();
        $tabs.find(s.tabViewer + ':first-child').show();
        $tabs.find('li:first-child').addClass("is-active");
        
        $tabs.find(s.tabNav).on('click', function () {
          $tabs.find(s.tabViewer).addClass('fade-in');
          $tabs.find(s.tabNav).removeClass("is-active");
          $(this).addClass("is-active");
          $tabs.find(s.tabViewer + ':eq(' + $(this).index() + ')').show().siblings().hide();
        });
      });
    },
  };

  if($('.js-tabs').length) { 
    Tabbies.init();
  }
})(jQuery);