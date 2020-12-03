@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp
@php
//dd($model->photo_unserialize)

@endphp
<div id="drobzone-photo">
@if(is_array($model->photo_unserialize))
<div style="border:1px solid black;padding:10px">
@foreach($model->photo_unserialize as $k=>$item)
<div class='rm'>

<input type="hidden" name="gallery[{{$k}}]" value="{{$item}}"/>

 уже загружено <a href="{{URL::asset($item)}}" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="{{$item}}" id="{{$model->id}}" target="_blank" class='slider_remove'>
удалить</a>
@if(isset($model->hint_unserialize[$k]))

<input type="text" 
placeholder="Заголовок картинки"
name="hint[]" value="{{$model->hint_unserialize[$k]}}"
class="form-control"
/>
@else
<input type="text" 
placeholder="Заголовок картинки"
name="hint[]" value=""
class="form-control"
/>
@endif

 </br>
 </div>
@endforeach
</div>
@endif

</div>
<br><br>
<div>  
<label for="title"><b>Заголовок(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name ) ? $model->name : old('name')}}" 
name='name' placeholder="" 
class="form-control"/>
   @if($errors->has('name'))
    <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
    </span>
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
   @if($errors->has('publish'))
    <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('publish') }}</strong>
    </span>
    @endif
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
 id="editor"
 class="form-control">
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
  //disallowedContent: 'a[href]',
  
  height: 300, });
  CKEDITOR.config.removePlugins = 'image';

</script>

<script>
	$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})

</script>