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
<div> 
<label for="title"><b>название -  точка-1</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->first_point) ? $model->first_point : ''}}' name='first_point' placeholder="точка-1" class="form-control"/>
</div>
<br>
<div>
<label for="title"><b>название -  точка-2</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->two_point) ? $model->two_point : ''}}' name='two_point' placeholder="точка-2" class="form-control"/>
</div>
<br>
<div>
<label for="title"><b>название -  точка-3</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->three_point) ? $model->three_point : ''}}' name='three_point' placeholder="точка-3" class="form-control"/>
</div>
<br>

<div> 
<label for="title"><b>Конечная точка</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->end_point) ? $model->end_point : ''}}' name='end_point' placeholder="Конечная точка" class="form-control"/>
</div>

<br><br>

<div>
<label for="title"><b>Координата 1</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->coords[0]->coord_a) ? $model->coords[0]->coord_a : ''}}" 
name='coord_a' placeholder="{{$page ? '': 'Координа 1'}} " 
class="form-control"/>
</div>
<div>  
<label for="title"><b>Координата 2</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->coords[0]->coord_b) ? $model->coords[0]->coord_b : ''}}" 

name='coord_b' placeholder="{{$page ? '': 'Координа 2'}} " 
class="form-control"/>
</div>

<div>  
<label for="title"><b>Координата 3</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text"
value="{{isset($model->coords[0]->coord_c) ? $model->coords[0]->coord_c : ''}}" 
name='coord_с' placeholder="{{$page ? '': 'Координа 3'}} " 
class="form-control"/>
</div>
<div>  
<label for="title"><b>Координата 4</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->coords[0]->coord_d) ? $model->coords[0]->coord_d : ''}}" 
name='coord_d' placeholder="{{$page ? '': 'Координа 4'}} " 
class="form-control"/>
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
		

	

 
  

