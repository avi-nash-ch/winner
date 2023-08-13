
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyCheqXXLZiGbGYObQTX6HkOTjDklpBPCw0" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 2000px; height: 1000px;"></div>

  <script type="text/javascript">
    <?php $location=''; foreach ($AllWorkers as $key => $value) {
      $location.='['.$value->name.','.$value->lat.','. $value->lng.','.($key+1).']';
    }
    // echo $location;
    ?>
    var locations = [
      '<?= $location ?>'
      // ['Bondi Beach jhsgdjdjasy', 19.1463, 73.0081, 4],
      // ['Coogee Beach', 19.1254, 72.9992, 5],
    ];
    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(19.1463, 73.0081),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      
      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>
