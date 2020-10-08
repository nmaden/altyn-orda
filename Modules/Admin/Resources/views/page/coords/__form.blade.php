  @php

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp
<style>
#divs,#divs2{
	margin-bottom:10px;
	margin-top:10px;
}
</style>




<button class="add_field_button btn btn-success
">Добавить координату</button>
<div class='clearfix'></div>
<div style='border:1px solid white;padding:0px 10px;' class='col-md-6'>

@if($model->coord)
@foreach($model->coord as $k=>$coord)
<div> 
<label for="title"><b>координата {{$k+1}} (<span style='font-size:11px;color:#ccc'>
для удаления сделайте поле пустым</span>)</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
value='{{isset($coord->coord) ? $coord->coord : ''}}' 
name='coord[]' placeholder="координаты" class="form-control"/>
</div>
@endforeach
@endif

<div class="input_fields_wrap"></div>

</div>



<div style='border:1px solid white;padding:0px 10px;' class='col-md-6'>

@if($model->coords)
@foreach($model->coords as $k=>$coord)
<div> 
<label for="title"><b>название координаты {{$k+1}}</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($coord->coord_name) ? $coord->coord_name : ''}}' name='coord_name[]' placeholder="координаты" class="form-control"/>
</div>
@endforeach
@endif

<div class="input_fields_wrap2">
 
</div>
</div>


<div class='clearfix'></div>
<br><br>







<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.coor_block')</legend>
    <div class="row">
        <div class="col-md-12">
            <div id='map' style="width: 100%; height: 600px;" ></div>
        </div>
        <input type="hidden" name="data[coor]" value="" id="data_coor">
    </div>  
</fieldset>




    



























 <div>   
 <label for="title"><b>Выберите Маршрут
</b></label> 

	   <select {{$page ? 'disabled': ''}} name="routes_id" id="city_id" class="form-control select2">
			<option value=""></option>
				
			@if(count($model->getCityAr()) > 0)
            @foreach ($model->getRoutersAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->routes_id == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		</div>
		
		
 <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU"
        type="text/javascript">
	</script>


<script type="text/javascript">
        
    
        $(document).ready(function () {

            var myMap;
            ymaps.ready(init);
             center = [];

			 var ar =[];

			//JSON.parse($('#data_coor').val(''));
							

			center=[43.21032757450292,76.8788819999999];

		if($('#data_coor').val()){
                var keys = JSON.parse($('#data_coor').val());

		         keys.forEach(key=>{
					var coord_a_1 = key[0];
                    var coord_a_2 = key[1];
		           ar.push(new Array(coord_a_1,coord_a_2)); 

				   })
				   				   center=[ar[0][0],ar[0][1]];

		}
		
			console.log(ar);
			
/*---------------------------------------------------------------*/
            function init()
            {

                try {
                    ar_coor = JSON.parse($('#data_coor').val());
                } catch (err) {
                    ar_coor = [];
                }




                        
						
			   var multiRoute = new ymaps.multiRouter.MultiRoute({
                referencePoints:ar,
				
                params: {
					routingMode: 'masstransit',
					      viaIndexes: [10]
					//routingMode: 'auto' //на автомобиле
					//routingMode: 'pedestrian' //пешеходный маршрут
				    //routingMode: 'bicycle' //на велосипеде
                     //avoidTrafficJams: true с учетом пробок

                    //results: 1,
                    //reverseGeocoding: true
                }

            }, {
                boundsAutoApply: true,
                editorDrawOver: false,
				    editorMidPointsType: "via",
                wayPointStartIconLayout: "default#image",
                wayPointStartIconImageHref: "",
                wayPointIconLayout: "default#image",
                wayPointIconImageHref: "",
                wayPointFinishIconLayout: "default#image",
                wayPointFinishIconImageHref: "",


                routeStrokeWidth: 2,
                routeStrokeColor: "#0A8232",
                routeActiveStrokeWidth: 10,
                routeActiveStrokeColor: "#0A8232",
				
            });
			
			multiRoute.editor.start({
    // При включении опции addWayPoints пользователи смогут создавать
    // путевые точки по клику на карте.
    addWayPoints: true,
    // При включении опции removeWayPoints пользователи смогут удалять
    // путевые точки. 
    // Для удаления точки нужно дважды кликнуть по ней.
    removeWayPoints: true,
    // При включении опции addMidPoints пользователи смогут создавать
    // новые промежуточные точки.
    // Чтобы создать промежуточную точку, нужно кликнуть по линии маршрута и,
    // удерживая кнопку, переместить точку в нужную позицию на карте.
    // Тип промежуточной точки (путевая или транзитная) задается в опции 
    // editorMidPointsType.
    addMidPoints: true
});
			/*
var changeLayoutButton = new ymaps.control.Button({
data: { content: "Показывать время для пеших сегментов"},
options: { selectOnClick: true } });
// Объявляем обработчики для кнопки.
changeLayoutButton.events.add('select', function () {
multiRoute.options.set(
// routeMarkerIconContentLayout - чтобы показывать время для всех сегментов.
"routeWalkMarkerIconContentLayout",
ymaps.templateLayoutFactory.createClass('ffffffffff')); });
*/
						
                var myMap = new ymaps.Map("map",{
                    center: center,

                    zoom: 14,
                    //behaviors: ["default", "scrollZoom"]
                },
                {
                    //balloonMaxWidth: 300
                });

						
           ar_coor.forEach(key=>{
			var coord_a_1 = key[0];
           var coord_a_2 = key[1];
	       var t = '<div class="route__miker--block"><div class="route__miker--m"></div><div class="route__miker--title">'+'стоооооооо'+'</div></div>'
				
			

	        myMap.geoObjects.add(
			new ymaps.Placemark(
                [coord_a_1, coord_a_2],
                {
                    hintContent: ''
                }, {
                iconLayout: ymaps.templateLayoutFactory.createClass(t),
            }
            ));
		
	       })
   
		 
            myMap.geoObjects.add(multiRoute);
			
			
	// Подписка на событие обновления данных маршрута.
// Подробнее о событии в справочнике.
// Обратите внимание, подписка осуществляется для поля model.
multiRoute.model.events.add('requestsuccess', function() {
    // Получение ссылки на активный маршрут.
    var activeRoute = multiRoute.getActiveRoute();
    // Вывод информации о маршруте.
    console.log("Длина: " + activeRoute.properties.get("distance").text);
    console.log("Время прохождения: " + activeRoute.properties.get("duration").text);
    // Для автомобильных маршрутов можно вывести 
    // информацию о перекрытых участках.
    if (activeRoute.properties.get("blocked")) {
        console.log("На маршруте имеются участки с перекрытыми дорогами.");
    }
});
						

                $.each( ar_coor, function( key, value ) {
					
                    var myPlacemark = new ymaps.Placemark(value);
                    myPlacemark.unix_id = ar_coor.length - 1;
                    myMap.geoObjects.add(myPlacemark);

                    myPlacemark.events.add('click', function (e) {
                        var pl = e.get('target');

                        ar_coor.splice(pl.unix_id, 1);
                        myMap.geoObjects.remove(pl);

                        
                        $('#data_coor').val(JSON.stringify(ar_coor));
                    });
                    
                });








                myMap.events.add("click", function(e){
					
                    var coords = e.get("coords");
                   
                    ar_coor.push([coords[0].toPrecision(10), coords[1].toPrecision(10)])
                    

                    //myPlacemark = new ymaps.Placemark([coords[0].toPrecision(10), coords[1].toPrecision(10)]);
                    //myPlacemark.unix_id = ar_coor.length - 1;
                    //myMap.geoObjects.add(myPlacemark);
                
/*
                    myPlacemark.events.add('click', function (e) {
                        var pl = e.get('target');
                         
                        ar_coor.splice(pl.unix_id, 1);
                        myMap.geoObjects.remove(pl);

                        
                        $('#data_coor').val(JSON.stringify(ar_coor));
                    });
*/
                    $('#data_coor').val(JSON.stringify(ar_coor));
                });

                
				
		
var searchControl = new ymaps.control.SearchControl({
    options: {
        // Будет производиться поиск только по топонимам.
        provider: 'yandex#map'
    }
});
//myMap.controls.add(searchControl);
myMap.controls.remove('searchControl').add(searchControl);
// Подписка на событие выбора результата поиска.
searchControl.events.add('resultselect', function (e) {
	
    // Получает массив результатов.
    var results = searchControl.getResultsArray();

    // Индекс выбранного объекта.
    var selected = e.get('index');
    // Получает координаты выбранного объекта.
    var point = results[selected].geometry.getCoordinates();
	alert(point);
	                    

	ar_coor.push([point[0], point[1]])

	$('#data_coor').val(JSON.stringify(ar_coor));

			

})

				
				
				
				

            }
			



            
        });
		
    </script>
	
<script>	
   $(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
	var wrapper2 = $(".input_fields_wrap2"); //Fields wrapper

    var add_button = $(".add_field_button"); //Add button ID
	var add_button2 = $(".add_field_button2"); //Add button ID


    var x = 1; //initlal text box count
    $(add_button).click(function(e){
		
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $("#rm").remove(); 

               $(wrapper).append('<div id="divs"><input type="text" name="coord[]"  class="form-control"/><a href="#" id="rm" class="remove_field">Remove</a></div>'); //add input box
                
				$(add_button2).trigger( "click" );
				
				 $(wrapper2).append('<div id="divs2"><input type="text" name="coord_name[]"  class="form-control" placeholder="название координаты"/></div>'); //add input box
               
				
        }
    });
	
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); 
		$("#divs").remove(); x--;
		$("#divs2").remove(); x--;
       

    })
	

 



    
});
	
</script>
 