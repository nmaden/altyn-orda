@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
@endphp
<!--------------------------------------
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
----------------------------------->



<div>  
 <label for="title"><b>путь к изображению(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->namesocial) ? $model->namesocial: ''}}" 
name='namesocial' placeholder="{{$page ? '': 'http://www.w3.org/2000/svg'}} " 
class="form-control"/>
</div>

<br><br>
<div>  
 <label for="title"><b>URL(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->path) ? $model->path: ''}}" 
name='path' placeholder="{{$page ? '': 'https://vk.com/name'}} " 
class="form-control"/>
</div>

