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
<label for="title"><b>Большой заголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="заголовок" 
class="form-control"/>
</div>
<div>  
<br><br>
<label for="title"><b>Второй заголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->description) ? $model->description: ''}}" 
name='description' placeholder="заголовок" 
class="form-control"/>
</div>