@php
use Illuminate\Support\Facades\DB;


$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}


$categories = DB::table('lib_gid_speacialisations')->get();
@endphp








<div>  
 
<label for="title"><b>Имя</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
@if(isset(Session::get('old')['imya']))
	value="{{Session::get('old')['imya']}}" 
@else
value='{{$model->imya ? $model->imya : ''}}' 
@endif
name='imya' placeholder="Имя(текс)" class="form-control"></input>
@if ($errors->has('imya'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('imya') }}</strong>
   </span>
@endif
</div>

<br><br>
<div>  
<label for="title"><b>Денежная еденица</b></label> 
<input {{$page ? 'disabled': ''}} type="text" 
@if(old('phone'))
	value="{{old('currency')}}" 
@else
	value="{{isset($model->currency) ? $model->currency : ''}}" 
@endif
name='currency' placeholder="тг" class="form-control"></input>
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

