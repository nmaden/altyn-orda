@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

@endphp

<div>  
<label for="title"><b>Название</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="заголовок(текст)" 
class="form-control"/>
</div>

<br><br>

<div>  
<label for="title"><b>Подзаголовок</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" 
value="{{isset($model->subtitle) ? $model->subtitle: ''}}"
name='subtitle' 
class="form-control"
placeholder="Это важный исторический памятник Золотой Орды(текст)"
/>
</div>

<br><br>

<div> 
<label for="title"><b>Тур</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value='{{$model->introtext}}' 
name='introtext' 
placeholder="3D тур(текст)" 
value="{{isset($model->introtext) ? $model->introtext : ''}}"
class="form-control"/>
</div>

<br><br>



<div>
<!--дата основания--->
<label for="title"><b>Дата основания</b></label> 

<input {{$page ? 'disabled': ''}}
 type="text" 
 value='{{isset($model->date) ? $model->date : ''}}' 
 name='date' 
 placeholder="пример: X—XI вв.(текст)" 
 class="form-control"/>
</div>

<br><br>
<!--время посещения--->
<div> 
<label for="title"><b>Время посещения</b></label> 
<input {{$page ? 'disabled': ''}} type="text" value='{{isset($model->time) ? $model->time : ''}}' 
name='time' placeholder="Время посещения(текст)" class="form-control"/>
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


