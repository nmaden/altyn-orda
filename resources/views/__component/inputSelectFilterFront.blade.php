@if (isset($model))
	
   <select 
	   ( class={{isset($class) ? $class : ''}}
	   name="{{ $name }}" 
	   >
	   <option value="">{{Lang::get('front_main.program.all')}}</option>
	  @foreach ($dataar as $k => $v)
        <option 
		  value="{{ $k }}" 
		  {{ (isset($value) && $value == $k) || ($model->{$name} == $k && !isset($value)) ? 'selected' : '' }}>{{ $v }}
		  </option>
     @endforeach
      </select>
  
							
							

@endif






