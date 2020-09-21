@php
use Illuminate\Support\Facades\DB;


$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}


$categories = DB::table('gid_speacialisations')->get();
@endphp

<div>
<label for="photo"><b>Фото</b></label>
<input {{$page ? 'disabled': ''}} type="file" value="{{$model->photo}}" name='photo' placeholder="Фото" class="form-control"/>
 @if(isset($model->photo))
 Фото уже загружено <a href="{{URL::asset($model->photo)}}" target="_blank">просмотреть</a>
@else 
	Фото нет
 @endif
</div>




<br><br>


<div>  
 
<label for="title"><b>Имя</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
 @if(old('imya'))
  value="{{old('imya')}}"
@else
value="{{$model->imya ? $model->imya : old('imya')}}"
@endif
name='imya' placeholder="Имя(текст)" class="form-control"></input>
@if ($errors->has('imya'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('imya') }}</strong>
   </span>
@endif
</div>

<br><br>


<div>  
<label for="title"><b>Возраст</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
 @if(old('vosrast'))
	 value="{{old('vosrast')}}"

 @else
	value='{{isset($model->vosrast) ? $model->vosrast : ''}}'

 @endif
 name='vosrast' 
 placeholder="Возраст(цифра)" class="form-control"></input>
 @if ($errors->has('vosrast'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('vosrast') }}</strong>
   </span>
@endif
</div>

<br><br>

<div>  
<label for="opyt"><b>Опыт работы</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
@if(old('opyt'))
value="{{old('opyt')}}"
@else
	value="{{isset($model->opyt) ? $model->opyt : ''}}"
@endif

 name='opyt' placeholder="Опыт работы(текст)" class="form-control"></input>
@if ($errors->has('opyt'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('opyt') }}</strong>
   </span>
@endif

</div>

<br><br>

<div>  
<label for="title"><b>Телефон</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
@if(old('phone'))
	value="{{old('phone')}}" 
@else
	value="{{isset($model->phone) ? $model->phone : ''}}" 
@endif
name='phone' placeholder="Телефон(текст)" class="form-control"></input>
@if ($errors->has('opyt'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('opyt') }}</strong>
   </span>
@endif

</div>

<br><br>

<div>  
 <label for="title"><b>Тип гида</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 

@if(isset(Session::get('old')['name']))
	value="{{Session::get('old')['name']}}" 
@else
value='{{isset($model->name) ? $model->name : ''}}' 
@endif
name='name' placeholder="{{$page ? '': 'Туристический гид(текст)'}}" class="form-control"></input>
@if ($errors->has('name'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
   </span>
@endif
</div>


<br><br>


<div>
<label for="text"><b>День/час </b></label> 
<select name="oplata" 
class="form-control"   
 {{$page ? 'disabled': ''}}
>
<option>

</option>
<option 
value=2
{{ in_array($model->oplata,array(2)) ? 'selected' : '' }}
>день
</option>
<option 
value=1 
{{ in_array($model->oplata,array(1)) ? 'selected' : '' }}
>час
</option>

</select>
</div> 


<br><br>

<div>  
<label for="text"><b>Текст</b></label> 
<textarea {{$page ? 'disabled': ''}} 
name='description'
rows="14" 
cols="4" 
class="{{$page ? 'form-control' : 'wysihtml5 wysihtml5-default form-control'}} ">
@if(isset(Session::get('old')['description']))
{{Session::get('old')['description']}}
@else
{{isset($model->description) ? $model->description : ''}}
@endif
</textarea>
</div>
<br><br>
<div>   
		<label for="title"><b>Выберите специализацию</b></label> 
		 
	
			<select {{$page ? 'disabled': ''}} name="spec_id" id="spec_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
			
		
			@if(count($categories) > 0)
					
            @foreach ($categories as $k => $v)
                <option value="{{ $k }}" {{ $model->spec_id == $k ? 'selected' : '' }}>{{ $v->name }}</option>
						@endforeach
						
			@else
				ничего нет
			@endif
        </select>
</div>
<br><br>

<div>
<label for="text"><b>Языки: выбрать один или несколько </b></label> 
<select name="lang_id[]" 
 id="{{ isset($id) ? $id : '' }}" 
 class="form-control select2"   
 {{$page ? 'disabled': ''}}
 multiple
     >
	 @php
	 //dd($model->arLangId);
	 @endphp
@foreach ($model->getLangAr() as $k => $v)
<option 
value="{{ $k }}" 
{{ is_array($model->arLangId) && in_array($v, $model->ar_lang_id) ? 'selected' : '' }}
>{{ $v }}</option>
            @endforeach
        </select>
</div> 

<br><br>
  <div> 
    Выберите город
			<select {{$page ? 'disabled': ''}} name="city_id" id="city_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				
			@if(count($model->getCityAr()) > 0)
            @foreach ($model->getCityAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->city_id == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		</div>
		<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
		</script>
