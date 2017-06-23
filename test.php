<html>
    <head>
        <?php include 'head.php' ?>
        
<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXT5tE6qamqP_aiaaOmDGmHXj29hDqmoc&callback=init_map"></script>
        

    </head>
    <body>
        
       <div class="row"> 
        <div id="map" class="col s6" style="height:100%"></div>

        
        <iframe class="col s6"  style="height:100%" frameborder='0' scrolling='no' marginwidth='0'src=http://bhuvan.nrsc.gov.in/map/bhuvan/embed.html?l=51.95888671875&b=9.86572265625&r=111.24111328125&t=35.13427734375&val=m></iframe>  
        </div>
        
        <script>
            var map,infoWindow;
            function init_map() {
                var myCenter = new google.maps.LatLng(22.76,82.53);
                var mark=new google.maps.LatLng(28.65,77.20);
                var mapCanvas = document.getElementById("map");
                var mapOptions = {center: myCenter, zoom: 5};
                 map = new google.maps.Map(mapCanvas, mapOptions);
                var marker = new google.maps.Marker({position:mark});
                marker.setMap(map);
                infoWindow = new google.maps.InfoWindow;
                if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          },{maximumAge:600000, timeout:5000, enableHighAccuracy: true});
        }else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
            }
         function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
         </script>
    </body>
</html>