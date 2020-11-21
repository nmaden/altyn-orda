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
<div style="border:2px solid #ccc;padding:10px">

<div>
<label for="photo"><b>Фото(детальная страница)</b></label>
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
<br>
<div>
<label for="photo"><b>Фото(отображение в каталоге)</b></label>
 <input {{$page ? 'disabled': ''}} 
type="file" 
value="{{$model->photo_catalog}}" 
name='photo_catalog' 
placeholder="Фото" 
class="form-control"/>
@if (isset($model->photo_catalog)) 
 уже загружено <a href="{{URL::asset($model->photo_catalog)}}" target="_blank">просмотреть</a>
@else
Фото не загружено
@endif
</div>
</div>


@endif


<br><br>
<div id="drobzone-photo" style="border:1px solid black;padding:10px">
@if(is_array($model->photo_unserialize))

@foreach($model->photo_unserialize as $k=>$item)
<div class='rm'>

<input type="hidden" name="gallery[]" value="{{$item}}"/>

 уже загружено <a href="{{URL::asset($item)}}" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="{{$item}}" id="{{$model->id}}" target="_blank" class='slider_remove'>
удалить</a>
<input type="text" name="hint[]" value=""
class="form-control"
/>


 </br>
 </div>
@endforeach
@endif


@if(in_array('update',$ar))
<div>
<div id="file" data-path = "legenda"  name='file' class="upload"></div>
 <div class='preview'></div>
</div>
<br><br>
@endif
</div>
<br><br>
<div>   
   <p><b>Опубликовать</b></p>
	  <select {{$page ? 'disabled': ''}} name="publish" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				 <option  {{ $model->publish == 2 ? 'selected' : '' }} value="2">активно</option>
				 <option {{ $model->publish == 1 ? 'selected' : '' }} value="1">черновик</option>

			
        </select>
		</div>
		

<br><br>

<div>  
<label for="title"><b>Заголовок(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name ) ? $model->name : ''}}" 
name='name' placeholder="" 
class="form-control"/>
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
 
 class="form-control {{$page ? '' : ''}} wysihtml5 wysihtml5-default">
 {{isset($model->description) ? $model->description : ''}}
</textarea>
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
<label for="text"><b>социальные кнопки:  поделиться</b></label>

 <select name="social[]" 
 id="{{ isset($id) ? $id : '' }}" 
 class="form-control select2"   
 {{$page ? 'disabled': ''}}
 multiple
   <option value="0">@lang('model.disabled')</option>
   @foreach($model->getSocialAr() as $k=>$item)
   <option {{in_array($k,$model->ar_social_un) ? 'selected' : ''}} value="{{$k}}"  >{{$item}}</option>

  @endforeach
</select>

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
	$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})

</script>