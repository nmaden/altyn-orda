<style>
#divs,#divs2{
	margin-bottom:10px;
}
</style>

@php
use Illuminate\Support\Facades\DB;

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}


$categories = DB::table('routes_categories')->get();
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
name='name' placeholder="{{$page ? '': 'Заголовок'}} " 
class="form-control"/>
</div>

<br><br>

<div>  
<label for="title"><b>Подзаголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->props_1) ? $model->props_1 : ''}}"
name='props_1' 
class="form-control"
placeholder="{{$page ? '': 'О маршруте'}} "
/>
</div>
<br><br>


<div>   
		<label for="title"><b>Выберите категорию</b></label> 
		 
	
			<select {{$page ? 'disabled': ''}} name="category_id" id="category_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
			
		
			@if(count($categories) > 0)
					
            @foreach ($categories as $k => $v)
                <option value="{{ $k }}" {{ $model->category_id == $k-1 ? 'selected' : '' }}>{{ $v->name }}</option>
						@endforeach
						
			@else
				ничего нет
			@endif
        </select>
</div>


</br></br>

<!--время посещения--->
<div> 
<label for="title"><b>Время посещения</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->props_3) ? $model->props_3 : ''}}' name='props_3' placeholder="{{$page ? '': 'Например 2'}} " class="form-control"/>
</div>


<br><br>


<div> 
<label for="title"><b>Стоимость</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->price) ? $model->price : ''}}' name='price' placeholder="Стоимость" class="form-control"/>
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

<div style='border:1px solid #ccc;padding:20px 10px;'>
@if(count($model->coords) > 0)
@foreach($model->coords as $k=>$coord)
<div> 
<label for="title"><b>координата {{$k+1}} (<span style='font-size:11px;color:#ccc'>для удаления сделайте поле пустым</span>)</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($coord->coord) ? $coord->coord : ''}}' name='coord[]' placeholder="координаты" class="form-control"/>
</div>
@endforeach
@endif

<div class="input_fields_wrap">
    <button class="add_field_button btn btn-success
">Добавить координату</button>
<br>
</div>

</div>

<br><br>


<div style='border:1px solid #ccc;padding:20px 10px;'>
@if(count($model->coords) > 0)
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
 

