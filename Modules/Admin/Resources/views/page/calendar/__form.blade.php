@php
use Illuminate\Support\Facades\DB;

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}

$categories = DB::table('lib_categories')->get();

@endphp
<div>
<label for="photo"><b>Фото</b></label>
 <input {{$page ? 'disabled': ''}} type="file" value="{{$model->photo}}" name='photo' placeholder="Фото" class="form-control">
 @if(isset($model->photo))
 уже загружено <a href="{{URL::asset($model->photo)}}" target="_blank">
 просмотреть</a>
 @else
	 Фото не загружено
 @endif
</div>



<br><br>

 <div>
  <label for="title"><b>Дата</b></label> 
     <!----*------></span>
                <input 
					class="form-control"
					id="datepicker"
					type="text" name="date" 
					max="3"
					{{$page ? 'disabled': ''}}
					value="{{isset($model->view_date) ? $model->view_date : ''}}">
					@if ($errors->has('date'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('date') }}</strong>
   </span>
@endif
                </div>

<br><br>

<div>
 <label for="title"><b>Заголовок</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
value='{{isset($model->name) ? $model->name : ''}}' name='name' placeholder="заголовок(текст)" class="form-control"></input>
@if ($errors->has('name'))
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
		</div>
		
<br><br>







<div>
 <label for="text"><b>Текст</b></label> 
<textarea {{$page ? 'disabled': ''}}  
value='' name='text'  class="form-control {{$page ? '' : 'wysihtml5 wysihtml5-default'}}">
{{isset($model->text) ? $model->text : ''}}</textarea>
</div>


<br><br>
<div>   
		Выберите категорию 
	
			<select {{$page ? 'disabled': ''}} name="category_id" id="category_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
			
		
			@if(count($categories) > 0)
					
            @foreach ($categories as $k => $v)
                <option value="{{ $k }}" {{ $model->category_id == $k ? 'selected' : '' }}>{{ $v->name }}</option>
						@endforeach
						
			@else
				ничего нет
			@endif
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
		

<br><br>
 <div>   
@php
//dd($model->getDateAr());
@endphp
    Близкие мероприятия(по умолчанию все события на неделю вперед)
			<select {{$page ? 'disabled': ''}} name="blizkie" id="" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				
			@if(count($model->getDateAr()) > 0)
            @foreach ($model->getDateAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->blizkie == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				ничего нет
			@endif
        </select>
		</div>
<br><br>		
		



<div>
<label for="text"><b>социальные кнопки:  поделиться</b></label>
 @php
//dd($model->ar_social_un);
@endphp
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
