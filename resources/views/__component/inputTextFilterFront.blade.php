

   <label class="univerProgramHeaderItem">
       
   
	<input type="text" 
        @if (isset($lang) && $lang == 'kz')
             name="kz[{{ $name }}]"
             value="{{ $model->relTransKz ? $model->relTransKz->{$name} : '' }}" 
        @elseif (isset($lang) && $lang == 'en')
             name="en[{{ $name }}]"
             value="{{ $model->relTransEn ? $model->relTransEn->{$name} : '' }}" 
        @else 
             name="{{ $name }}" 
             value="{{ isset($value) ? $value : $model->{$name} }}" 
         @endif
             id="{{ isset($id) ? $id : '' }}" class="form-control {{ isset($class) ? $class  : ''}}" 
             {{ isset($disabled) ? 'disabled' : '' }} 
             {{ isset($required) ? 'required' : '' }} {!! isset($extra) ? $extra: '' !!}
       
             placeholder="{{Lang::get('front_main.program.placeHolder_name')}}"
           
       
			/>
		
      </label>
						
						
						
						
						
						
						
						
						
						
						

