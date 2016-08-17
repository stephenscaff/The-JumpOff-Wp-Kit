/*----------------------------------------
  Stupid simple Google maps plugin.
  Parses text into a Gmap, from a vcard.

  Usage:

  <!-- Sect Map
  ================================================== -->
  <section class="js-map">
    <div class="location">Way of the Dog</div>
    <div class="address">527 S. Juanita Ave</div>
    <div class="city">Redondo Beach</div>
    <div class="state">CA</div>
    <div class="zip">90277</div>
    <div class="country">USA</div>
    <div class="phone">310-543-0375</div>
    <div class="zoom">13</div>
  </section>
-----------------------------------------*/

/* jshint undef: false, unused: false, -W020 */
/* global $vcardGmap, google */

//Do maps exist?
if ($(".js-map").length) {
  $(function() {
    // Stylers array
    var styles = [
      {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
          { "saturation": 36 },
          { "color": "#f16d49"  },
          { "lightness": 10 }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
          { "visibility": "on" },
          { "color": "#000000" },
          { "lightness": 16 }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
          { "color": "#111111" },
          { "lightness": 50 }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 17 },
          { "weight": 1.2 }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "labels",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
          { "visibility": "simplified" }
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "geometry",
        "stylers": [
          { "visibility": "simplified" }
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "labels.text",
        "stylers": [
          { "visibility": "simplified"}
        ]
      },
      {
        "featureType": "administrative.province",
        "elementType": "all",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "administrative.locality",
        "elementType": "all",
        "stylers": [
          { "visibility": "simplified" },
          { "saturation": "-100" },
          { "lightness": "30" }
        ]
      },
      {
        "featureType": "administrative.neighborhood",
        "elementType": "all",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "all",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
          { "visibility": "simplified" },
          { "gamma": "0.00" },
          { "lightness": "74" }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 20 }
        ]
      },
      {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
          { "lightness": "3" }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
          { "visibility": "off" }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 21 }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          { "visibility": "simplified" }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
          {  "color": "#000000" },
          { "lightness": 15 }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 29 },
          { "weight": 0.2 }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 18 }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 16 }
        ]
      },
      {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 19 }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          { "color": "#000000" },
          { "lightness": 17 }
        ]
      }
    ];

    // Render to
    $maps = $('.js-map');
    $maps.each(function(index, Element) {
      $vcardGmap = $(Element);
      //Map vars
      var map;
      var geocoder;
      var marker;
      var infowindow;
      var address = 
      $vcardGmap.children('.address').text() + ', ' + 
      $vcardGmap.children('.city').text() + ', ' + 
      $vcardGmap.children('.state').text() + ' ' + 
      $vcardGmap.children('.zip').text() + ', ' + 
      $vcardGmap.children('.country').text();
      
      // Info Window Content
      var content = 
      $vcardGmap.children('.location').text() + '<br />' + 
      $vcardGmap.children('.address').text() + '<br/>' + 
      $vcardGmap.children('.city').text() + '&nbsp;' + 
      $vcardGmap.children('.state').text() + '&nbsp;' + 
      $vcardGmap.children('.zip').text();
      
      //If ya got a phone number, add it to the info window
      if (0 < $vcardGmap.children('.phone').text().length) {
        content += '<br />' + $vcardGmap.children('.phone').text();
      }
      geocoder = new google.maps.Geocoder();
      // Geocode that Address son
      geocoder.geocode({
        'address': address
      }, function(results, status) {
        
        // Status check
        if (status === google.maps.GeocoderStatus.OK) {
          vcardGmapOptions.center = results[0].geometry.location;
          map = new google.maps.Map(Element, vcardGmapOptions);
          
          //Marker customizations  
          marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            animation: google.maps.Animation.DROP,
            //icon: 'images/yourdopemarker.png',
            title: $vcardGmap.children('.location').text()
          });
          
          //Create tile/info window
          infowindow = new google.maps.InfoWindow({
            'content': content
          });
          google.maps.event.addListener(map, 'tilesloaded', function(event) {
            infowindow.open(map, marker);
          });
          
          //Click marker to open tile
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
          
          // Stay centered on resize
          google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
          });
        } else {
          // Alert if map fails
          alert('Google maps error: ' + status);
        }
      });

      /*----------------------------------------------   
      --vcardGmapOptions
      -----------------------------------------------  */
      var vcardGmapOptions = {
        //Set zoom within vcard
        'zoom': parseInt($vcardGmap.children('.zoom').text()),
        'mapTypeId': google.maps.MapTypeId.ROADMAP,
        'mapTypeControl': false,
        'scrollwheel': false,
        'disableDefaultUI': false,
        'styles': styles
      };
    });
  });
}
