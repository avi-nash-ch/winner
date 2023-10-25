<h1>Delivery Boy's Location</h1>
<html>
  <head>
    <title>Workers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- <link rel="stylesheet" type="text/css" href="./style.css" /> -->
    <!-- <script type="module" src="./index.js"></script> -->
    <style>
      /* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
#map {
  height: 100%;
}

/* 
 * Optional: Makes the sample page fill the window. 
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
    </style>
  </head>
  <body>
    <div id="map"></div>

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCheqXXLZiGbGYObQTX6HkOTjDklpBPCw0&callback=initMap&v=weekly"
      defer>
    </script>
  </body>
</html>
<script>
  // The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: { lat: 19.148575, lng:  72.989941 },
  });

  setMarkers(map);
}

<?php
    $s='';
    $i = 0;
    foreach ($AllWorkers as $key => $w) {
      $i++;
    $s.='["'.$w->name.'('.$w->whatsapp_no.')",'.$w->lat.','.$w->lng.'],';
    }
?>
// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.
// const beaches = [
//   ["Bondi Beach", 19.148548, 72.989929],
//   ["Coogee Beach", 19.1490794, 72.9903514],
//   ["Cronulla Beach", 19.1406517, 72.9987225],
// ];
const beaches = [
 <?= $s ?>
];
// console.log(beaches)
function setMarkers(map) {
  // Adds markers to the map.
  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.
  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  // const image = {
  //   url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
  //   // This marker is 20 pixels wide by 32 pixels high.
  //   size: new google.maps.Size(20, 32),
  //   // The origin for this image is (0, 0).
  //   origin: new google.maps.Point(0, 0),
  //   // The anchor for this image is the base of the flagpole at (0, 32).
  //   anchor: new google.maps.Point(0, 32),
  // };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  const shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: "poly",
  };

  for (let i = 0; i < beaches.length; i++) {
    const beach = beaches[i];

    new google.maps.Marker({
      position: { lat: beach[1], lng: beach[2] },
      map,
      // icon: image,
      shape: shape,
      title: beach[0],
      // zIndex: beach[3],
    });
  }
}

window.initMap = initMap;
</script>