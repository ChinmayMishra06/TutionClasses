<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaBcDeFgHiJkLmNoPqRsTuVwXyZ&callback=initialize"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script> -->

<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', initialize);
    function initialize(){
        var autocomplete = new google.maps.places.autocomplete(document.getElementById('txtautocomplete'));
        google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var place = autocomplete.getPlace();
            var location = '<b>Location</b>' + place.formatted_address + "<br/>";
            location += "<b>Latitude</b>" + place.geometry.location.A + "<br/>";
            location += "<b>Longitude</b>" + place.geometry.location.F + "<br/>";
            document.getElementById('lblresult').innerHTML = location;
        });
    }
</script>
<span>Location:</span><input type="text" name="txtautocomplete" id="txtautocomplete" placeholder="Enter address"><br><br>
<label id="lblresult"></label>
</body>
</html>