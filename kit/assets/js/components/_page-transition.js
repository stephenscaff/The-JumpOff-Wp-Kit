  /**
   *  Page Transitions
   *  All sexy like page transitions between page loads
   *  Adds 'is-loading' | 'is-loaded' classes for loading
   *  Adds 'is-exiting' class while exiting
   *  Exclude links with 'no-trans' class
   *
   *  @since    v1.3. New loading classes
   *  @since    v1.2  Added exclude class
   *  @see      scss/utils/animations-transitions.scss
   *  @author   Stephen Scaff
   */

// Page Transition
var PageTransition = (function() {
  var s, siteURL = 'http://' + top.location.host.toString();
  var noTrans = 'no-trans';

  return {
    settings: {
      noTransLinks: $('a[href^="' + siteURL + '"], a[href^="/"], a[href^="./"], a[href^="../"]').not('.'+noTrans),
      linkLocation: null,
      body: $('html, body'),
      exitDuration: 1700,
      entranceDuration: 800,
    },

    init: function() {
      s = this.settings;
      this.loadingClasses();
      this.transitionPage();
      this.unloadWindow();
      this.workaround();
    },

    /**
     * Handle our loading classes
     */
    loadingClasses: function() {
      s.body.addClass('is-loading');
      // Remove class to prevent any Webkit bugs
      setTimeout(function() {
        $('body').removeClass('is-loading').addClass("is-loaded");
      }, s.entranceDuration);
    }, 

    /** 
     * Transition Page
     */
    transitionPage: function() {
      s.noTransLinks.on('click', function(e) {

        // Bail if body has no-trans class
        if (s.body.hasClass(noTrans)) {
          return;
        }
        // Bail if modifer keys (must be before preventDefault)
        if (e.metaKey || e.ctrlKey || e.shiftKey) {
          return;
        }
        e.preventDefault();

        // Our Link location reference
        s.linkLocation = this.href;
        
        // Redirect Page  to link location
        function redirectPage() {
          window.location = s.linkLocation;
        }

        // Add our is-exiting class
        s.body.addClass('is-exiting');

        // for a simple fadeout then redirect:
        // $('body').fadeOut(500, redirectPage);
        
        // Redirect page after ExitDuration
        setTimeout(function() {
          redirectPage();
        }, s.exitDuration);

      });
    },

    /**
     * Unload Window
     * Ensures back button works in FF,
     * @todo  update for jquery 3
     */
    unloadWindow: function() {
      // For back button history
      $(window).unload(function() {
        $(window).unbind('unload');
      });
    },
    /**
     * Workaround
     * Check the persisted property of the onpageshow event
     * to stop back button cache in Safari
     * @todo  update for jquery 3
     */
    workaround: function() {
      // For Safari browser
      $(window).bind('pageshow', function(e) {
        if (e.originalEvent.persisted) window.location.reload();
      });
    },
  };
})(); 
PageTransition.init();