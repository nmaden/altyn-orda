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
<label for="title"><b>email</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->email) ? $model->email: ''}}" 
name='email' placeholder="" 
class="form-control"/>
@if ($errors->has('email'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('email') }}</strong>
   </span>
@endif

</div>
<br><br>

<div>  
<label for="title"><b>ФИО</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="" 
required
class="form-control"/>
@if ($errors->has('name'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
   </span>
@endif

</div>

<br><br>
<div>  
<label for="title"><b>ЛОГИН</b></label> 
<input {{$page ? 'disabled': ''}} 
@if(old('login'))
	type="text" value="{{old('login')}}" 

	@else
type="text" value="{{isset($model->login) ? $model->login: ''}}" 

@endif
name='login' placeholder="" 
required
class="form-control"/>
@if ($errors->has('login'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('login') }}</strong>
   </span>
@endif

</div>

<br><br>
<div>  
<label for="title"><b>Пароль:</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="" 
name='password' placeholder="" 
class="form-control"/>
@if ($errors->has('password'))
  <span class="help-block">
     <strong style='color:#a94442'>{{ $errors->first('password') }}</strong>
   </span>
@endif

</div>
<br><br>

