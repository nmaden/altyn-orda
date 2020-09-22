@php
use Illuminate\Support\Facades\DB;

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

$categories = DB::table('categories')->get();

@endphp








<div>
 <label for="title"><b>Заголовок</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
value='{{isset($model->name) ? $model->name : ''}}' name='name' placeholder="заголовок(текст)" class="form-control"></input>
@if ($errors->has('name'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
   </span>
@endif
</div>


<br><br>

<div>
 <label for="text"><b>Текст</b></label> 
<textarea {{$page ? 'disabled': ''}}  
value='' name='text'  class="form-control {{$page ? '' : 'wysihtml5 wysihtml5-default'}}">
{{isset($model->text) ? $model->text : ''}}</textarea>
</div>

