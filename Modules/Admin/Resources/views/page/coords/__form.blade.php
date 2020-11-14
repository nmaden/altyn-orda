  @php

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp
<style>
#rm{
	cursor:pointer;
	color:blue;
		margin-bottom:10px;

}
.r{
	margin-bottom:30px;
}
.r a{
margin:0px;
padding:0px;
}
.hide{
display:none;
}
.show{
 display:block;
}
</style>
    @if (count($errors) > 0)
    <div class="alert alert-danger" style='text-align:center'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.coor_block')</legend>
    <div class="row">
        <div class="col-md-12">
            <div id='map' style="width: 100%; height: 600px;" ></div>
        </div>
        <input type="hidden" name="data[coor]" value="{{$model->check_coordinate}}" id="data_coor">
		 <input type="hidden" name="metr[]" value="{{$model->metr}}" id="data_metr">

    </div>  
</fieldset>
<input type="button" value="Завершить редактирование" id="stopEditPolyline"/>
<input type="button" value="Начать редактирование" id="start"/>
<br>
<br>
<button class="add_field_button btn btn-success
">Добавить координату</button>
<div class='clearfix'></div>
<br>
<div style='border:1px solid white;padding:0px 0px;' class='col-md-4'>
@if($model->coordinate)
@foreach($model->coordinate as $k=>$coord)
<div class='r'> 
<input {{$page ? 'disabled': ''}} type="text" 
value='{{isset($coord) ? $coord : ''}}' 
name='coord' placeholder="координаты" class="form-control coords"
/>
</div>
@endforeach
@endif
<div class="input_fields_wrap"></div>
</div>


<div style='border:1px solid white;padding:0px 10px;' class='col-md-4'>
@if($model->coordinate)
@foreach($model->coordinate as $k=>$coord)
<div class='r'> 
<input  {{$page ? 'disabled': ''}} 
type="text" value='{{isset($model->coordinate_name[$k]) ? $model->coordinate_name[$k] : ''}}' 
name='coord_name[]' onchange="bb()" placeholder="название координаты" class="form-control"/>
</div>
@endforeach
@endif
<div class="input_fields_wrap2"></div>
</div>


<div id="distance" style='border:1px solid white;padding:0px 10px;' class='col-md-4'>
@if($model->coordinate)
@foreach($model->coordinate as $k=>$coord)
<div class='r'> 
<input  {{$page ? 'disabled': ''}} 
type="text" value='{{isset($model->distance_name[$k]) ? $model->distance_name[$k] : ''}}' 
name='distance[]' placeholder="расстояние(для ручного определения)" class="form-control"/>
</div>
@endforeach
@endif

<div class="input_fields_wrap3"></div>
</div>





<div class='clearfix'></div>
<br></br>
<br></br>
<div class='clearfix'></div>
 <div>   
 <label for="title"><b>ручное или автоматическое определение
</b></label> 

	   <select {{$page ? 'disabled': ''}} name="auto" id="select" class="form-control select2">
			<option value=""></option>
			
			<option value="1" {{ $model->auto == 1 ? 'selected' : '' }}>ручное определение</option>
			<option value="2" {{ $model->auto == 2 ? 'selected' : '' }}>автоматическое определение</option>

			
        </select>
		@if ($errors->has('auto'))
         <span class="help-block">
         <strong style='color:#a94442'>{{ $errors->first('auto') }}</strong>
         </span>
       @endif
	   
 </div>
<br>
</br>


<div>   
 <label for="title"><b>Маршрут
</b></label> 

	   <select {{$page ? 'disabled': ''}} name="routes_id" id="city_id" class="form-control select2">
			<option value="0">не выбрано</option>
				
			@if(count($model->getCityAr()) > 0)
            @foreach ($model->getRoutersAr() as $k => $v)
		@if($v)
                <option value="{{ $k }}" {{ $model->routes_id == $k ? 'selected' : '' }}>{{ $v }}</option>
			@endif
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		@if ($errors->has('routes_id'))
         <span class="help-block">
         <strong style='color:#a94442'>{{ $errors->first('routes_id') }}</strong>
         </span>
       @endif
	   
		</div>

		
 <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU"
 type="text/javascript">
 </script>


<script>	
   $(document).ready(function() {
	   	$('body').bind('input','.coords',function () {
			
		var arc =[];
        $('.coords').each(function(index,v){
			var values = v.value;
			
			if(values){

			arc[index]=values.split(',');
			}
		})
			console.log(arc);
			$('#data_coor').val(JSON.stringify(arc));


		 

		 
		});
	
	   $('#select').on('change',function(){
		 $('#distance').removeClass('hide');

		   $('#distance').addClass('show');
	   })
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
	var wrapper2 = $(".input_fields_wrap2"); //Fields wrapper
	var wrapper3 = $(".input_fields_wrap3"); //Fields wrapper

    var add_button = $(".add_field_button"); //Add button ID
	//var add_button2 = $(".add_field_button2"); //Add button ID


    var x = 1; //initlal text box count
    $(add_button).click(function(e){
		
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$("#rm").remove(); 

               $(wrapper).append('<div id="divs"><input type="text" name="coord"  value="" class="form-control coords" placeholder="для удаления координаты сделайте поле пустым"/><div class=" remove_field" id="rm">Remove</div>'); //add input box
                
				
				//$(add_button2).trigger( "click" );
				
	$(wrapper2).append('<div id="divs2"><input type="text" name="coord_name[]"  class="form-control " placeholder="название координаты"/><div class="r"</div></div>'); //add input box
				 
				 $(wrapper3).append('<div id="divs3"><input type="text" name="coord_distance[]"  class="form-control" placeholder="введите растояние(для ручного определения)"/><div class="r"</div></div>'); //add input box
               
				
        }
    });
	
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); 
		$("#divs").remove(); x--;
		$("#divs2").remove(); 
       $("#divs3").remove();

    })
	

 



    
});
	
</script>
 
<script type="text/javascript">
        // Как только будет загружен API и готов DOM, выполняем инициализацию
	        

	
	   
        ymaps.ready(init);

			 var ar =[];
             var center = [];
			//JSON.parse($('#data_coor').val(''));
			
			if($('#data_coor').val()){
                var keys = JSON.parse($('#data_coor').val());

		         

		         keys.forEach(key=>{
					var coord_a_1 = key[0];
                    var coord_a_2 = key[1];
		           ar.push(new Array(coord_a_1,coord_a_2)); 

				   })
				   center=[ar[0][0],ar[0][1]];
			}else{
				   center=[43.21032757450292,76.8788819999999];

			}


        function init () {
            // Создание экземпляра карты и его привязка к контейнеру с
            // заданным id ("map")
            var myMap = new ymaps.Map('map', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
                    center: center, // Нижний Новгород
                    zoom: 8
                });
				 //myMap.controls.add('zoomControl').add('typeSelector').add('mapTools')
				
				try {
                    ar_coor = JSON.parse($('#data_coor').val());
                } catch (err) {
                    ar_coor = [];
                }

				
							console.log(ar);

			
				
			var geometry = ar,
			
			properties = {
				hintContent: "Ломаная линия"
			},
			options = {
				draggable: true,
				strokeColor: '#ff0000',
				strokeWidth: 5
        
			},
			polyline = new ymaps.Polyline(geometry, properties, options);

						
				
			myMap.geoObjects.add(polyline);
			
					$('#start').click( 
					function () {polyline.editor.startEditing();polyline.editor.startDrawing();})


			 $('#stopEditPolyline').click(
			 
                function () {
                    // Отключаем кнопки, чтобы на карту нельзя было
                    // добавить более одного редактируемого объекта (чтобы в них не запутаться).
                    //$('input').attr('disabled', true);

                    polyline.editor.stopEditing();
					printGeometry(polyline.geometry.getCoordinates());

                });	
				
				function printGeometry (coords) {
                  $('#data_coor').val(JSON.stringify(coords));
				  console.log(coords);
                  
                 }	
				
				
				   $.each( ar_coor, function( key, value ) {
					
                    var myPlacemark = new ymaps.Placemark(value);
                    myPlacemark.unix_id = ar_coor.length - 1;
                    myMap.geoObjects.add(myPlacemark);

                    
                });


				
				$('#kilometr').click(function(){
					var ctx = $(this);
			      $("#kilometr").val("Загрузка...");
				   
                   var ar_coor = JSON.parse($('#data_coor').val());
				   
				   //console.log(ar_coor);
				   var last_coord = ar_coor.length-1;
				  
				   var km=[];
                   var index=0;
				   var index2=0;

                   ar_coor.forEach(key=>{
					   index++;
				   var pointA = key[0]+','+key[1]; //Откуда считаем
                   var pointB = ar_coor[last_coord][0]+','+ar_coor[last_coord][1]; //Куда считаем
	               ymaps.route([pointA , pointB ]).then(
                   function (route) {
					   
                    var distance = route.getHumanLength(); //Получаем расстояние
					var point = route.requestPoints[0];
						var m = distance.match(/^[\d]+&/);
						var m2 = distance.match(/^[\d]+/);
						 $('#data_metr').val('');
                         km.push(new Array(m2,point)); 
                         $('#data_metr').val(JSON.stringify(km));
						 var len = km.length;
						 if(index2 !=0){
							 len = len + index2;
						 }
                         if(len ==index){
							$("#kilometr").val("расчет растояния");

						 }
                      },
                  function (error) {
					  index2++;
					  //alert('Ошибка: ' + error.message); 
				  }
                 );
				 
			   })
			     
                 //console.log(km);

		
				})
				
		$('.btn-primary').on('click',function(e){
		            //polyline.editor.stopEditing();
					//printGeometry(polyline.geometry.getCoordinates());
                    
		   
            return true;
	   })
	   
		myMap.setBounds(myMap.geoObjects.getBounds(),{checkZoomRange:true, zoomMargin:9});

				
        }
    </script>

