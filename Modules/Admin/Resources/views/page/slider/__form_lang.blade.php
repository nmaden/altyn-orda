  @php

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp

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