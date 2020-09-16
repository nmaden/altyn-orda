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
<label for="title"><b>Название</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="{{$page ? '': 'Заголовок(текст)'}} " 
class="form-control"/>
</div>

<br><br>

<div>  
<label for="title"><b>Подзаголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->subtitle ) ? $model->subtitle  : ''}}"
name='subtitle' 
class="form-control"
placeholder="{{$page ? '': 'О маршруте(текст)'}} "
/>
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
















  


