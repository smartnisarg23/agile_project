<script src="https://maps.googleapis.com/maps/api/js?key=31a0472549782d1207ea3556fcdc1f438060f5a8&libraries=places&callback=initMap" async defer></script>
<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;

      function initMap() {
        var pyrmont = {lat: -33.867, lng: 151.195};

//        map = new google.maps.Map(document.getElementById('map'), {
//          center: pyrmont,
//          zoom: 15
//        });
//
//        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: 500,
          type: ['store']
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            console.log("callback "+i,results[i]);
          }
        }
      }

    </script>