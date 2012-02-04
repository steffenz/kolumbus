<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  function initialize() {
    var latlng = new google.maps.LatLng(58.989828,5.674782);
    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
      zoom: 14,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));
    var marker = new google.maps.Marker({
      position: latlng, 
      map: map, 
      title:"My location"
    }); 
  }
  function calcRoute() {
    var start = document.getElementById("routeStart").value;
    var end = "58.989828,5.674782";
    var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.DirectionsTravelMode.PUBLIC
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  }
</script>
</head>
<body onload="initialize()">

<div id="map_canvas" style="width:710px; height:300px"></div>   
    <form action="" onsubmit="calcRoute();return false;" id="routeForm">
        <input type="text" id="routeStart" value="">
        <input type="submit" value="Route plannen">
    </form>
<div id="directionsPanel"></div>
</body>
</html>