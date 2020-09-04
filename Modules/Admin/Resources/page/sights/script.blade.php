<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDql8ox3Z7AQIpoGzNYEztSLaCe_kwVuwE&callback=initMap"
type="text/javascript"></script>
<script type="text/javascript" src="/geo/jquery-ui-1.8.1.custom.min.js"></script> 
<script type="text/javascript">
 
var geocoder;
var map;
var marker;
var markers = [];
 function initMap(){
function initialize(){
	
	
	  var latlng = new google.maps.LatLng(59.9342802,30.335098600000038);

            var options = {
                zoom: 16,
                center: latlng,
				//mapTypeId: google.maps.MapTypeId.SATELLITE

            };
            map = new google.maps.Map(document.getElementById('map_canvas'), options);
            geocoder = new google.maps.Geocoder();
	
	
	

 
  marker = new google.maps.Marker({
    map: map,
    draggable: true
  });
 
}
 
$(document).ready(function() { 
 
  initialize();
 
  $(function() {
    $("#address").autocomplete({
      //Определяем значение для адреса при геокодировании
      source: function(request, response) {
        geocoder.geocode( {'address': request.term}, function(results, status) {
          response($.map(results, function(item) {
            return {
              label:  item.formatted_address,
              value: item.formatted_address,
              latitude: item.geometry.location.lat(),
              longitude: item.geometry.location.lng()
            }
          }));
        })
      },
      //Выполняется при выборе конкретного адреса
      select: function(event, ui) {
        $("#latitude").val(ui.item.latitude);
        $("#longitude").val(ui.item.longitude);
		var coord = ui.item.latitude + ',' + ui.item.longitude;
		$("#coord").val(coord);

        var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
        marker.setPosition(location);
        map.setCenter(location);
      }
    });
  });
 
  //Добавляем слушателя события обратного геокодирования для маркера при его перемещении  
  google.maps.event.addListener(marker, 'drag', function() {
    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#address').val(results[0].formatted_address);
          $('#latitude').val(marker.getPosition().lat());
          $('#longitude').val(marker.getPosition().lng());
        }
      }
    });
  });
 
});
 }
</script> 
	