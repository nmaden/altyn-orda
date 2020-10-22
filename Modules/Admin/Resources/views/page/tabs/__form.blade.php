@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;

if(in_array('show',$ar)){
	$page = true;
}

@endphp


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

<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 


<textarea 
 {{$page ? 'disabled': ''}}
 value="" 
 name='description' 
  rows="16" 
 cols="4" 
 id="{{in_array('create',$ar) ? '' : 'editor'}}"
 class="form-control {{$page ? '' : ''}}">
 {{isset($model->description) ? $model->description : ''}}
</textarea>
</div>

<br><br>





 @if($lang == 'ru')
<br><br>
<div>  
 <label for="title"><b>Дата</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->date) ? $model->date: ''}}" 
name='date' placeholder="{{$page ? '': '1269'}} " 
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
name='name' placeholder="заголовок" 
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


<script>
	
  CKEDITOR.replace('editor', {
  filebrowserUploadUrl: "{{route('uploads2')}}",
  disallowedContent: 'a[href]',
  height: 300, });
	
</script>
