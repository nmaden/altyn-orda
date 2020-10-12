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
	margin-bottom:20px;
	margin-top:20px;
}
</style>


<div style='border:1px solid white;padding:0px 10px;' class='col-md-6'>

@if($model->coordinate)
@foreach($model->coordinate as $k=>$name)
<div> 
<label for="title"><b>название координаты {{$k+1}}</b></label> 
<input  {{$page ? 'disabled': ''}} 
type="text" value='{{isset($model->coordinate_name[$k]) ? $model->coordinate_name[$k] : ''}}' 
name='coord_name[]' onchange="bb()" placeholder="координаты" class="form-control"/>

</div>
<br>
@endforeach
@endif

<div class="input_fields_wrap2">
 
</div>
</div>
<div class='clearfix'></div>