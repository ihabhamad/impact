var locations = [
    [
      40.678178,             // Latitude
      -73.944158,             // Longititude
      'listing-img-1-lg.jpg',        // Main Image
      'Lake Heaven',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'          // Class
    ],
    [
      40.675431,             // Latitude
      -73.891296,             // Longititude
      'listing-img-2-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'          // Class
    ],
    [
      40.727486,             // Latitude
      -73.917389,             // Longititude
      'listing-img-3-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'         // Class
    ],
    [
      40.748948,             // Latitude
      -73.914814,             // Longititude
      'listing-img-4-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon',          // Class
    ],
    [
      40.754799,             // Latitude
      -73.906746,             // Longititude
      'listing-img-5-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'          // Class
    ],
    [
      40.759871,             // Latitude
      -73.911209,             // Longititude
      'listing-img-6-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'          // Class
    ],
    [
      40.762211,             // Latitude
      -73.918076,             // Longititude
      'listing-img-7-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon',          // Class
    ],
    [
      40.700162,             // Latitude
      -73.924599,             // Longititude
      'listing-img-8-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon',          // Class
    ],
    [
      40.691052,             // Latitude
      -73.910351,             // Longititude
      'listing-img-9-lg.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon'          // Class
    ],
    [
      40.705758,             // Latitude
      -73.905544,             // Longititude
      'custom-img-1-ws.jpg',        // Main Image
      'Cafe Hapus',     // Title
      'Brooklyn',            // Location
      'gl-restaurant-icon.svg',          // Map Icon
      'gl-restaurant-icon',          // Class
    ]
];


var map = new google.maps.Map(document.getElementById('gl-contact-map'), {
    zoom: 15,
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
      imgLink = locations[i][2],
      nAme = locations[i][3],
      lOcation = locations[i][4],
      markerIcon = 
      '<div class="gl-marker-icon '+locations[i][6]+'">'+
        '<div class="gl-map-marker-img">'+
          '<img src="images/'+locations[i][5]+'"/>'+
        '</div>'+
      '</div>';

  marker = new RichMarker({
    position: new google.maps.LatLng(lat, lng),
    map: map,
    icon: locations[i][5],
    flat: true,
    anchor: RichMarkerPosition.MIDDLE,
    content: markerIcon
  });
  markers.push(marker);

  infoBubble = new InfoBubble({
    maxWidth: 350,
    shadowStyle: 0,
    padding: 0,
    backgroundColor: '#ffffff',
    borderRadius: 0,
    arrowSize: 8,
    borderWidth: 0,
    // disableAutoPan: true,
    hideCloseButton: true,
    arrowPosition: 15,
    autopanMargin: 5,
    backgroundClassName: 'phoney',
    arrowStyle: 0
  });

   marker.html =
    '<div class="gl-map-marker-wrapper gl-restaurant-listing-map">'+
      '<div class="gl-map-marker-img">'+
        '<img src="images/'+imgLink+'"/>'+
      '</div>'+
      '<div class="gl-map-marker-info-details">'+
        '<h3 class="gl-heading">'+nAme+'</h3>'+
        '<p class="gl-location">'+ lOcation +'</p>'+
      '</div>'+
    '</div>';

  infoBubble.close(map, marker);

  google.maps.event.addListener(marker, 'click', function() {
    if (!infoBubble.isOpen()) {
      infoBubble.setContent(this.html);
      infoBubble.open(map, this);
    } else {
      infoBubble.close(map, marker);
      infoBubble.setContent(this.html);
      infoBubble.open(map, this);
    }
    google.maps.event.addListener(map, 'click', function() {
        infoBubble.close(map, marker);
    }); 
  });
}

function AutoCenter() {
  var bounds = new google.maps.LatLngBounds();
  $.each(markers, function (index, marker) {
  bounds.extend(marker.position);
  });
  map.fitBounds(bounds);
}
AutoCenter();

$(".gm-style-iw").next("div").hide();