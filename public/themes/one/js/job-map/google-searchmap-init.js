var locations = [
    [
      40.678178,             // Latitude
      -73.944158,             // Longititude
      'company-6.png',        // Company Logo
      'Product Designer',     // Job Title
      'Brooklyn',           // Job Location
      'Part Time',             // Job Status
      'gl-job-icon'          // Class
    ],
    [
      40.675431,             // Latitude
      -73.891296,             // Longititude
      'company-3.png',        // Company Logo
      'Android Developer',     // Job Title
      'Brooklyn',           // Job Location
      'Full Time',             // Job Status
      'gl-job-icon'          // Class
    ],
    [
      40.727486,             // Latitude
      -73.917389,             // Longititude
      'company-5.png',        // Company Logo
      'iOs Developer',     // Job Title
      'Brooklyn',           // Job Location
      'Full Time',             // Job Status
      'gl-job-icon'          // Class
    ]
    ,
    [
      40.691052,             // Latitude
      -73.910351,             // Longititude
      'company-1.png',        // Company Logo
      'Front End Developer',     // Job Title
      'Brooklyn',           // Job Location
      'Full Time',             // Job Status
      'gl-job-icon'          // Class
    ],
    [
      40.705758,             // Latitude
      -73.905544,             // Longititude
      'company-4.png',        // Company Logo
      'Creative Designer',     // Job Title
      'Brooklyn',           // Job Location
      'Full Time',             // Job Status
      'gl-job-icon'          // Class
    ]
];


var map = new google.maps.Map(document.getElementById('gl-search-map'), {
    zoom: 16,
    scrollwheel: false,
    styles: [{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ffa900"}]}],
    center: new google.maps.LatLng(40.742445, -73.911381)
});


var marker, i;
var markers = new Array();
var infowindow = new google.maps.InfoWindow();

for (i = 0; i < locations.length; i++) {

  var lat = locations[i][0],
      lng = locations[i][1],
      imgLink = locations[i][2],
      jobTitle = locations[i][3],
      jobLoc = locations[i][4],
      jobStatus = locations[i][5],
      markerIcon = 
      '<div class="gl-marker-icon '+locations[i][6]+'">'+
        '<div class="gl-map-marker-img">'+
          '<img src="images/'+locations[i][6]+'.svg"/>'+
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
    borderRadius: 5,
    arrowSize: 8,
    borderWidth: 0,
    // disableAutoPan: true,
    autopanMargin: 5,
    hideCloseButton: false,
    arrowPosition: 15,
    backgroundClassName: 'phoney',
    arrowStyle: 0
  });

  marker.html =
    '<div class="gl-map-marker-wrapper gl-job-listing-map">'+
      '<div class="gl-map-marker-comp-img">'+
        '<img src="images/'+imgLink+'"/>'+
      '</div>'+
      '<div class="gl-map-marker-info-details">'+
        '<h3 class="gl-job-heading">'+jobTitle+'</h3>'+
        '<p class="gl-job-location">'+ jobLoc +'</p>'+
        '<span class="gl-item-status-label part-time-job">'+ jobStatus +'</span>'+
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
