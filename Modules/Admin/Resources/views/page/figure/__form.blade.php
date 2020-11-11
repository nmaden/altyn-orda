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


<br><br>

<div>   
   <p><b>Опубликовать</b></p>
	  <select {{$page ? 'disabled': ''}} name="publish" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				 <option  {{ $model->publish == 2 ? 'selected' : '' }} value="2">активно</option>
				 <option {{ $model->publish == 1 ? 'selected' : '' }} value="1">черновик</option>

			
        </select>
		</div>
		



@if($lang == 'ru' || $lang != 'ru')
<br><br>
<div>  
 <label for="title"><b>Годы жизни(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->birth) ? $model->birth: ''}}" 
name='birth' placeholder="{{$page ? '': '1182-1225 '}} " 
class="form-control"/>
</div>
@endif



<br><br>

<div>  
<label for="title"><b>Имя(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->namefigure ) ? $model->namefigure : ''}}" 
name='namefigure' placeholder="Менгу-Тимур " 
class="form-control"/>
</div>

<br><br>
<div>  
 <label for="title"><b>Ранг(текстовое поле)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->status) ? $model->status: ''}}" 
name='status' placeholder="{{$page ? '': 'Хан'}} " 
class="form-control"/>
</div>

<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 
<textarea 
 {{$page ? 'disabled': ''}}
 value="" 
 name='descriptionfigure' 
  rows="16" 
 cols="4" 
 id="editor"
 class="form-control {{$page ? '' : ''}}">
 {{isset($model->descriptionfigure) ? $model->descriptionfigure : ''}}
</textarea>
 </div>
 
<br><br>

<div>  
 <label for="title"><b>текстовое поле</b></label> 
<input {{$page ? 'disabled': ''}} 

type="text" value="{{isset($model->introtext) ? $model->introtext: ''}}" 
name='introtext' placeholder="{{$page ? '': 'Место погребения гора Улытау, Казахстан'}} " 
class="form-control"/>
</div>

<br><br>

<div>  
 <label for="title"><b>подзаголовок(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 

type="text" value="{{isset($model->subtitle ) ? $model->subtitle : ''}}" 
name='subtitle' placeholder="{{$page ? '': 'Правитель Улуса Джучи'}} " 
class="form-control"/>
</div>



<br><br>

<div>
 <label for="title"><b>SEO-TITLE</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
value='{{isset($model->seo_title) ? $model->seo_title : ''}}' name='seo_title' placeholder="(текст)" class="form-control"></input>
@if ($errors->has('name'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
   </span>
@endif
</div>


<br><br>

<div>
 <label for="text"><b>SEO-DESCRIPTION</b></label> 
<textarea {{$page ? 'disabled': ''}}  
value='' name='seo_description'  class="form-control {{$page ? '' : 'wysihtml5 wysihtml5-default'}}">
{{isset($model->seo_description) ? $model->seo_description : ''}}</textarea>
</div>

<script>
	
  CKEDITOR.replace('editor', {
  filebrowserUploadUrl: "{{route('figureseditor')}}",
  disallowedContent: 'a[href]',
  height: 300, });
	
</script>