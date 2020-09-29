@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp
<div>
<label for="photo"><b>Фото</b></label>
 <input {{$page ? 'disabled': ''}} 
type="file" 
value="{{$model->photo}}" 
name='photo' 
placeholder="Фото" 
class="form-control"/>
@if (isset($model->photo)) 
 уже загружено <a href="{{URL::asset($model->photo)}}" target="_blank">просмотреть</a>
@else
Фото не загружено
@endif
</div>

<br><br>

<div>  
<label for="title"><b>Название</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="заголовок(текст)" 
class="form-control"/>
</div>

<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>Видео</b></label>
<div style="display: {{$page ? 'none': ''}}" >
<label for="text">Вставить Iframe видео</label> 
</div>
<textarea 
 {{$page ? 'disabled': ''}}
 value="{{isset($model->video) ? $model->video : ''}}" 
 name='video' 
 class="form-control">{{html_entity_decode($model->video)}}
</textarea>
</div>

<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>3D</b></label> 
<div style="display: {{$page ? 'none': ''}}" >
<label for="text">Вставить iframe 3D</label> 
</div>
<textarea 
 {{$page ? 'disabled': ''}}
 value="{{isset($model->props_5) ? $model->props_5 : ''}}" 
 name='props_5' 
 class="form-control">{{html_entity_decode($model->props_5)}}
</textarea>
</div>

<br><br>

<div>  
<label for="title"><b>Подзаголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->subtitle) ? $model->subtitle : ''}}"
name='subtitle' 
class="form-control"
placeholder="Это важный исторический памятник Золотой Орды(текст)"
/>
</div>

<br><br>

<div> 
<label for="title"><b>Тур</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value='{{$model->introtext}}' 
name='introtext' 
placeholder="3D тур(текст)" 
value="{{isset($model->introtext) ? $model->introtext : ''}}"
class="form-control"/>
</div>

<br><br>

<div>
<!--дата основания--->
<label for="title"><b>Дата основания</b></label> 

<input {{$page ? 'disabled': ''}}
 type="text" 
 value='{{isset($model->date) ? $model->date : ''}}' 
 name='date' 
 placeholder="пример: X—XI вв.(текст)" 
 class="form-control"/>
</div>


</br></br>

<!--время посещения--->
<div> 
<label for="title"><b>Время посещения</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->time) ? $model->time : ''}}' 
name='time' placeholder="Время посещения(текст)" class="form-control"/>
</div>


<br><br>


<div> 
<label for="title"><b>Стоимость</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->price) ? $model->price : ''}}' name='price' placeholder="Стоимость(цифра)" class="form-control"/>
</div>


<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 


<textarea 
 {{$page ? 'disabled': ''}}
 value="" 
 name='description' 
  rows="16" 
 cols="4" 
 class="form-control {{$page ? '' : 'wysihtml5 wysihtml5-default'}}">
 {{isset($model->description) ? $model->description : ''}}
</textarea>
 </div>


<br><br>
<div>
@if($page == false)

<label>Адрес для поиска: если объект не определяется, попробуйте вручную вбить координаты </label>
<input 
type='hidden' 
name="coord" 
id="coord"
type="text"/>

<input 
class="form-control" 
placeholder="Вводить название объекта"  
value="{{isset($model->coord_name) ? $model->coord_name : ''}}"
name="coord_name"  
id="address" 
type="text"/>

 <label>Широта (latitude): </label>
 <input id="latitude" 
 value="{{ isset($model->latitude) ? $model->latitude: ''
 }}"
 name="latitude"
 type="text"/>
 
 <label>Длогота (longitude): </label>
 <input id="longitude" 
  value="{{ isset($model->longitude) ? $model->longitude: '' }}"
   name="longitude"

type="text"/>
  @endif
 <!---<div id="map_canvas" style="width:800px; height:600px"></div>--->
 </div>
 
 <br><br>
 
 
<div>
    Выберите город
	<select {{$page ? 'disabled': ''}} name="city_id" id="city_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				
			@if(count($model->getCityAr()) > 0)
            @foreach ($model->getCityAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->city_id == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		</div>










 
	
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDql8ox3Z7AQIpoGzNYEztSLaCe_kwVuwE&callback=initMap"
  type="text/javascript"></script>
   <script type="text/javascript" src="/geo/jquery-ui-1.8.1.custom.min.js"></script> 

 
 <script type="text/javascript">
 /*-------
var geocoder;
var map;
var marker;
var markers = [];
 function initMap(){
function initialize(){
	
var latlng = new google.maps.LatLng(
{{isset($model->address2[0]) ? $model->address2[0]: 59.9342802}},
{{isset($model->address2[1]) ? $model->address2[1] : 30.335098600000038}});


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
   var coord1 = "<?=$model->address2[0]?>";
   var coord2 = "<?=$model->address2[1]?>";
   var coord =  coord1+','+coord2;
   $("#coord").val(coord);

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

$('#latitude').bind('keyup',function(){
	var coord = $("#latitude").val() + ',' + $("#longitude").val();
	$("#coord").val(coord);
})
    $('#longitude').bind('keyup',function(){
	var coord = $("#latitude").val() + ',' + $("#longitude").val();
	$("#coord").val(coord);

})

 }

 $('#latitude').bind('keyup',function(){
	var coord = $("#latitude").val() + ',' + $("#longitude").val();
	$("#coord").val(coord);
})
    $('#longitude').bind('keyup',function(){
	var coord = $("#latitude").val() + ',' + $("#longitude").val();
	$("#coord").val(coord);
 ------------------*/
})
</script> 

	