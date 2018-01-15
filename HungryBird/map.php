<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Carrier platform</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
        }
        body {
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        #pos-area {
            background-color: #009DDC;
            margin-bottom: 10px;
            width: 100%;
            height: auto;
            text-align: left;
            color: white;
        }
        #demo {
            padding-left: 3%;
            font-size: small;
            height: 40%;
        }
        #btn-area {
            height: 100px;
        }
        #map {
            margin-top:-1%;
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
        #warnings-panel {
            width: 100%;
            height:10%;
            text-align: center;
        }
    </style>

</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['user_address']) && isset($_SESSION['merchant_address']))
    {
        $user_address = $_SESSION['user_address'];
        $merchant_address = $_SESSION['merchant_address'];

    echo '<div id="pos-area">';
    echo '<p id="demo">Carrier Infomation：<br><br>';
    echo "<span>User_address: </span><div id='start'>$user_address</div>";
    echo "<span>Merchant_address: </span><div id='end'>$merchant_address</div><br></p>";

    echo "</div>";
    }
    ?>
    <div id="map"></div>
    &nbsp;
    <div id="warnings-panel"></div>
    <script type="text/JavaScript">
        var options = {timeout: 8000};
        var RiderLat = 32.2383887;
        var RiderLng = -110.9753321;
        var infoWindow;
        var map;
        var marker;
        var line;
        var lineSymbol;
        var path=[];
        var pos = {
              lat: 32.238, //position.coords.latitude,
              lng: -111//position.coords.longitude
            };

        function initMap() {

            var markerArray = [];

            // Instantiate a directions service.
            var directionsService = new google.maps.DirectionsService;

            // Create a map and center it on Manhattan.
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 13,
              center: {lat: RiderLat, lng: RiderLng},
              mapTypeId: 'terrain'
            });

            // Create a renderer for directions and bind it to the map.
            var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

            // Instantiate an info window to hold step text.
            var stepDisplay = new google.maps.InfoWindow;

            // Display the route between the initial start and end selections.
            calculateAndDisplayRoute(
                directionsDisplay, directionsService, markerArray, stepDisplay, map);
            // Listen to change events from the start and end lists.
            var onChangeHandler = function() {
              calculateAndDisplayRoute(
                  directionsDisplay, directionsService, markerArray, stepDisplay, map);
            };
            infoWindow = new google.maps.InfoWindow({map: map});
            //var myVar = setInterval(setInfo, 1000);
            lineSymbol = {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 8,
              strokeColor: '#393'
            };
          }

        function setInfo(){
            //get a random pos
            //line.setMap(null);
            //var oldpos = pos;
            changelocation();
            infoWindow.setPosition(pos);
            infoWindow.setContent('I am here.');

        }

        function changelocation(){

            pos = {
              lat: pos.lat + 0.001, //position.coords.latitude,
              lng: pos.lng + 0.001//position.coords.longitude
            };

        }

        function animateCircle(line) {
          var count = 0;
          window.setInterval(function() {
            count = (count + 1) % 200;

            var icons = line.get('icons');
            icons[0].offset = (count / 2) + '%';
            line.set('icons', icons);
            }, 20);
        }

        function calculateAndDisplayRoute(directionsDisplay, directionsService,
              markerArray, stepDisplay, map) {
            // First, remove any existing markers from the map.
            for (var i = 0; i < markerArray.length; i++) {
              markerArray[i].setMap(null);
            }

            // Retrieve the start and end locations and create a DirectionsRequest using
            // WALKING directions.
            var start = document.getElementById("start").innerHTML;
            var end = document.getElementById("end").innerHTML;
            directionsService.route({
              origin: start + ",tucson,az",
              destination: end + ", Tucson , Az",
              travelMode: 'DRIVING'
            }, function(response, status) {
              // Route the directions and pass the response to a function to create
              // markers for each step.
              if (status === 'OK') {
                document.getElementById('warnings-panel').innerHTML =
                    '<b>' + response.routes[0].warnings + '</b>';
                directionsDisplay.setDirections(response);
                showSteps(response, markerArray, stepDisplay, map);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });

          }

        function showSteps(directionResult, markerArray, stepDisplay, map) {
            // For each step, place a marker, and add the text to the marker's infowindow.
            // Also attach the marker to an array so we can keep track of it and remove it
            // when calculating new routes.
            var myRoute = directionResult.routes[0].legs[0];
            var marker;
            for (var i = 0; i < myRoute.steps.length; i++) {
              marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
              marker.setMap(map);
              var location = myRoute.steps[i].start_location;
              marker.setPosition(location);

              var latt = marker.getPosition().lat();
              var lngg = marker.getPosition().lng();
              path.push({ lat: latt ,lng: lngg });

              attachInstructionText(
                  stepDisplay, marker, myRoute.steps[i].instructions, map);
              //---------------------------------------------


            }
            line =new google.maps.Polyline({
                  path: path,
                  icons: [{
                    icon: lineSymbol,
                    offset: '100%'
                  }],
                  map: map
                });
            animateCircle(line);
          }

        function attachInstructionText(stepDisplay, marker, text, map) {
            google.maps.event.addListener(marker, 'click', function() {
              // Open an info window when the marker is clicked on, containing the text
              // of the step.
              stepDisplay.setContent(text);
              stepDisplay.open(map, marker);
            });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClqrJd1d41BaKOPQnL9tspAMrwjBNQ1qs&callback=initMap">
    </script>
</body>
</html>
