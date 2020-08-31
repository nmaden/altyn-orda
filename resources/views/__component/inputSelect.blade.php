

@if (isset($model))
    <div class="form-group">
        <label>
            @if (!isset($disabled) && $tooltip = Modules\Entity\Services\TooltipGenerator::get($model->title, $model->getLabel($name)))
                <i class="icon-help" data-popup="popover" data-trigger="hover" data-content='{{ $tooltip }}'></i>
            @endif
            {{ $model->getLabel($name) }}
            @if (isset($required))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select name="{{ $name }}" id="{{ isset($id) ? $id : '' }}" class="form-control select2 {{ isset($class) ? $class  : ''}}"  {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) ? 'required' : '' }}>
				@if(isset($disabled))
					<option value="">@lang('model.disabled')</option>
				  @endif
			   @if(!isset($value) || empty($value))
				<option value="">@lang('model.select')</option>
			   @endif
            @foreach ($dataar as $k => $v)
                <option value="{{ $k }}" {{ $model->{$name} == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
        </select>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
