/*jshint unused:false */
/*global jQuery */
/*jshint unused:false */
/*jshint -W081 */
jQuery(document).ready(function( $ ) {
  var s,
  LoadMore = {
    
    // Settings Object for variables
    settings: {
      nextLink: wpLoadMore.nextLink,
      pageNum:parseInt(wpLoadMore.startPage) + 1,
      maxPages: parseInt(wpLoadMore.maxPages),
      postsContainer: ("#js-posts"),
      linkContainer: $(".load-more"),
      link: $("#js-load-more"),
      linkButton: $("#js-load-more .btn"),
      linkText: "Keep Reading",
      linkLoadingText: 'Loading...',
    },

    /**
     * Init
     */
    init: function() {
      s = this.settings;
      this.bindEvents();
    },

    /**
     * Bind all our events
     */
    bindEvents: function(){

      LoadMore.hideLink();
      
      // Main click event
      s.link.click(function(e) {
        e.preventDefault();
        // If we have paginated posts
        if (s.pageNum <= s.maxPages) {
          LoadMore.loadPosts();
        }
        LoadMore.hideLink();
      });
    },

    /**
     * Hide link if no more posts
     */
    hideLink: function() {
      if (s.pageNum > s.maxPages) {
        //s.linkContainer.addClass('is-hidden');
        s.linkContainer.delay(500).fadeOut(800);
      }
    },

    /**
     * Updates paginaion pages
     */
    updateText: function(){
      s.link.text(s.loadingText);
    },

    /**
     * Gets Posts from available pagination
     */
    loadPosts: function(){
      $.get(s.nextLink, function(data) {
        $(data).find(s.postsContainer).children().appendTo(s.postsContainer).hide().slideDown('400');

        // Init Lazy load on inserted images
        site.lazy();

      }).done(function(data) {
        LoadMore.endAnimation();
      });
      LoadMore.animateLoader();
      
      // Update Pagination pages
      LoadMore.updatePage();
    },

    /**
     * Begins animation
     */
    animateLoader: function(){
      s.linkContainer.addClass('is-animating');
      s.linkButton.text('loading...');
    },

    /**
     * Ends our animation
     */
    endAnimation: function(){
      setTimeout(function() {
       s.linkContainer.removeClass('is-animating');
       s.linkButton.text('Keep Reading');
      }, 900);
    },

    /**
     * Updates paginaion pages
     */
    updatePage: function(){
      s.pageNum++;
      s.nextLink = s.nextLink.replace(/\/page\/[0-9]*/, '/page/' + s.pageNum);
      console.log(s.nextLink, s.pageNum);
    },
  };

  // Let's Go!
  if($('.load-more').length){
    LoadMore.init();
  }
});
