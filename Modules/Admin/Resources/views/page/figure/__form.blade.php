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
@if($lang == 'ru' || $lang != 'ru')

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
@endif

@if($lang == 'ru' || $lang != 'ru')
<br><br>
<div>  
 <label for="title"><b>Годы жизни</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->birth) ? $model->birth: ''}}" 
name='birth' placeholder="{{$page ? '': '1182-1225 '}} " 
class="form-control"/>
</div>
@endif



<br><br>

<div>  
<label for="title"><b>Имя</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->namefigure ) ? $model->namefigure : ''}}" 
name='namefigure' placeholder="Менгу-Тимур " 
class="form-control"/>
</div>

<br><br>
<div>  
 <label for="title"><b>Ранг</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->status) ? $model->status: ''}}" 
name='status' placeholder="{{$page ? '': 'Хан'}} " 
class="form-control"/>
</div>


