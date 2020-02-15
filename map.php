<!DOCTYPE html>
<html>

<body>
<?php 
	$lat = $_GET["lat"];
	$long = $_GET["long"]; 
	$name = $_GET["name"];
	echo "Latitude: ".$lat;
	echo "<br>";
	echo "Longitude: ".$long;
	echo "<br>";
	echo "Location: ".$name;
	
?>


<div id="map" style="width:100%;height:550px"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 15};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content: "<?php echo $name;?>"
  });
  infowindow.open(map,marker);
}
</script>



<!--

<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>); 
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    icon: "pinkball.png"
  });
  marker.setMap(map);
}
</script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Z9TJqeVrs4s4LWyaTlt0SRh41t9nTOk&callback=myMap"></script>

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>



