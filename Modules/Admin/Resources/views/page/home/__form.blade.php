@php
$route = Route::currentRouteName();
$ar = explode('_',$route);

$page = false;
if(in_array('show',$ar)){
	$page = true;
}
@endphp

<br><br>

@if($model->id == 5)
	@if($lang == 'ru' || !isset($lang) || $lang=='')

<div>
<label for="text"><b>Достопримечательности на карте</b></label> 
<select name="sight_id[]" 
 class="form-control select2"   
 {{$page ? 'disabled': ''}}
 multiple
     >
@foreach ($model->getSightsAr() as $k => $v)
<option 
value="{{ $k }}" 

{{ is_array($model->arsights) && in_array($k, $model->arsights) ? 'selected' : '' }}
>{{ $v }}</option>
</option>
@endforeach
</select>
</div> 


@php
//dd($model->getCalendarsAr());
@endphp
<br><br><br>
<div>
<label for="text"><b>Выбор мероприятий</b></label> 
<select name="calendar_id[]" 
 class="form-control select2"   
 {{$page ? 'disabled': ''}}
 multiple
     >
@foreach ($model->getCalendarsAr() as $k => $v)
<option 
value="{{ $k }}" 

{{ is_array($model->arcalendars) && in_array($k, $model->arcalendars) ? 'selected' : '' }}
>{{ $v }}</option>
</option>
@endforeach
</select>
</div> 
<br><br><br>
<div>
@php

@endphp
<label for="text"><b>Выбор гидов</b></label> 
<select name="gid_id[]" 
 class="form-control select2"   
 {{$page ? 'disabled': ''}}
 multiple
     >
@foreach ($model->getGidsAr() as $k => $v)
<option 
value="{{ $k }}" 

{{ is_array($model->argids) && in_array($k, $model->argids) ? 'selected' : '' }}
>{{ $v }}</option>
</option>
@endforeach
</select>
</div> 


@endif

@else
	


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



 @if($lang == 'ru' || !isset($lang))
<br><br>
<div>  
 <label for="title"><b>Дата</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->date) ? $model->date: ''}}" 
name='date' placeholder="{{$page ? '': '1269(текст)'}} " 
class="form-control"/>
</div>
@endif

<div>
<input  
type="hidden" value="2" 
name="about_page_id" 
class="form-control"/>
</div>


<br><br>
<div>  
<label for="title"><b>Заголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="заголовок(текст)" 
class="form-control"/>
</div>

<br><br>

 <div>   
    Выберите цвет
			<select {{$page ? 'disabled': ''}} name="color"  class="form-control">
			<option value="">Цвет не выбран</option>
				
            
                <option value="orange" {{ $model->color == 'orange' ? 'selected' : '' }}>оранжевый</option>
				
				<option value="green1" {{ $model->color == 'green1' ? 'selected' : '' }}>зеленый-1</option>
				
				<option value="blue" {{ $model->color == 'blue' ? 'selected' : '' }}>синий</option>
				
				<option value="red" {{ $model->color == 'red' ? 'selected' : '' }}>красный</option>
				
                <option value="green2" {{ $model->color == 'green2' ? 'selected' : '' }}>зеленый-2</option>
				
				<option value="green2" {{ $model->color == 'green2' ? 'selected' : '' }}>зеленый-2</option>
				
				
        </select>
		</div>




@endif




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







