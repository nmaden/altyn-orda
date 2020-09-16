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

