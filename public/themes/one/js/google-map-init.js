var locations = [
    [
      40.678178,             // Latitude
      -73.944158,             // Longititude
      'gl-restaurant-icon'          // Class
    ]
];


var map = new google.maps.Map(document.getElementById('gl-map-small'), {
    scrollwheel: false,
    styles: [{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ffa900"}]}],
    center: new google.maps.LatLng(40.754799, -73.906746)
});


var marker, i;
var markers = new Array();
var infowindow = new google.maps.InfoWindow();

for (i = 0; i < locations.length; i++) {

  var lat = locations[i][0],
      lng = locations[i][1],
      markerIcon = 
      '<div class="gl-marker-icon '+locations[i][2]+'">'+
        '<div class="gl-map-marker-img">'+
          '<img src="images/'+locations[i][2]+'.svg"/>'+
        '</div>'+
      '</div>';

  marker = new RichMarker({
    position: new google.maps.LatLng(lat, lng),
    map: map,
    icon: locations[i][2],
    flat: true,
    anchor: RichMarkerPosition.MIDDLE,
    content: markerIcon
  });
  markers.push(marker);

}

function AutoCenter() {
  var bounds = new google.maps.LatLngBounds();
  $.each(markers, function (index, marker) {
  bounds.extend(marker.position);
  });
  map.fitBounds(bounds);
  var listener = google.maps.event.addListener(map, "idle", function() { 
    map.setZoom(15);   // Set map zoom level here
    google.maps.event.removeListener(listener); 
  });
}
AutoCenter();

$(".gm-style-iw").next("div").hide();