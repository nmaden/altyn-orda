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




@endif






		<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
		</script>







