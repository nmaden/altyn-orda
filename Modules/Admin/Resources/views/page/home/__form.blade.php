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

</br></br>
<div>  
<label for="text"><b>О золотой орде</b></label> 
<textarea {{$page ? 'disabled': ''}} 
name='description'
rows="14" 
cols="4" 
class="{{$page ? 'form-control' : 'form-control'}} ">
@if(isset(Session::get('old')['description']))
{{Session::get('old')['description']}}
@else
{{isset($model->description) ? $model->description : ''}}
@endif
</textarea>
</div>



</br></br>
		<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
		</script>







