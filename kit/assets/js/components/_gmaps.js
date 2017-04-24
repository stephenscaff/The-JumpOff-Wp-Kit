if ($("#js-map").length) {
var CityMap = (function() {
  var s;
  var icon = {
    url: 'data:image/png;base64,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', // url
    scaledSize: new google.maps.Size(66, 103), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
  };

  /**
   * Settings
   */
  var settings = {
    cityMapRender: $('#js-map'),
    cityMarker: $('.marker'),
    self: null
  };

  return {

    /**
     * Init
     */
    init: function() {
      s = settings;
      this.renderMap();
    },

    /**
     * RenderMap
     */
    renderMap: function(){

      var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

      // Map Args
      var args = {
        zoom: 6,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: styles,
        scrollwheel: false,
        disableDefaultUI: false,
        mapTypeControl: false,
      };

      /**
       *  Parse Address markup to create map location
       */
      s.cityMapRender.each(function(index, Element) {
        
        $el = $(Element);

        //Map vars
        var map;
        var geocoder;
        var marker;
        var address = 
        $el.children('.address').text();
        
        // New Google Geocoder
        geocoder = new google.maps.Geocoder();
      
        // Geocode that Address son
        geocoder.geocode({ 'address': address }, 

        function(results, status) {
      
          // Status check
          if (status === google.maps.GeocoderStatus.OK) {

            args.center = results[0].geometry.location;
          
            map = new google.maps.Map(Element, args);
          
            // Center on resize
            CityMap.centerMapResize(map);
          
            //Marker customizations  
            marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              animation: google.maps.Animation.DROP,
              icon: icon,
            });
          } 
        });
      });  
    },

    /**
     * Center Map on Resize
     */
    centerMapResize: function(map){
      google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
      });
    },
  };
})();

CityMap.init();
}