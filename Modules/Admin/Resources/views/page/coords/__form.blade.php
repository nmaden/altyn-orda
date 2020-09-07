  @php

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp



 
<br><br>
<div>  
<label for="title"><b>Координаты через запятую</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->coord) ? $model->coord: ''}}" 
name='coord' placeholder="43.21032757450292, 76.8788819999999" 
class="form-control"/>
</div>
<br><br>

<div>  
<label for="title"><b>Номер точки</b></label> 
<input {{$page ? 'disabled': ''}} 
type="number" value="{{isset($model->undex_coord) ? $model->undex_coord: ''}}" 
name='undex_coord' placeholder="1" 
required
class="form-control"/>
</div>
<br><br>
<div>  
<label for="title"><b>Название точки</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="По следам золотой орды" 
class="form-control"/>
</div>
<br><br>

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
