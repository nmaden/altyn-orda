@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
//@if($lang == 'ru' || $lang != 'ru')@endif
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
<!------

@if($lang == 'ru' || $lang === '')
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
--------------->


<br><br>
<div>  
 <label for="title"><b>Название меню(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="{{$page ? '': ''}} " 
class="form-control"/>
</div>
<br><br>

<div>  
<label for="title"><b>URL(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->path ) ? $model->path : ''}}" 
name='path' placeholder="Менгу-Тимур " 
class="form-control"/>
</div>

<br></br>
  <div> 
<label for="title"><b>родительский пункт меню</b></label> 

    
			<select {{$page ? 'disabled': ''}} name="parent" id="parent" class="form-control">
			<option value="">@lang('model.disabled')</option>
				
			@if(!empty($model->getAr()) > 0)
            @foreach ($model->getAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->parent == $k ? 'selected' : '' }}>
                {{ $v }}
                </option>
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		</div>






