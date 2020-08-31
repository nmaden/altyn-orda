@if (isset($model))
    @php 
        $bool_val = (isset($value) ? $value : $model->{$name});
    @endphp
    <div class="form-group">
        <label class="display-block ">
            @if (!isset($disabled) && $tooltip = Modules\Entity\Services\TooltipGenerator::get($model->title, $model->getLabel($name)))
                <i class="icon-help" data-popup="popover" data-trigger="hover" data-content='{{ $tooltip }}'></i>
            @endif
            {{ $model->getLabel($name) }}
            @if (isset($required))
                <span class="text-danger">*</span>
            @endif
        </label>

      

        <label class="radio-inline">
            <input type="radio"
                @if (isset($group))
                    name="{{ $group }}[{{ $name }}]" 
                @else 
                    name="{{ $name }}" 
                @endif  
                {{ $bool_val ? 'checked' : '' }} value='1' {{ isset($required) ? 'required' : '' }} {{ isset($disabled) ? 'disabled' : '' }} >
            @lang('main.yes')
        </label>
		
		  <label class="radio-inline">
            <input type="radio" 
                @if (isset($group))
                    name="{{ $group }}[{{ $name }}]" 
                @else 
                    name="{{ $name }}" 
                @endif  
                {{ !$bool_val ? 'checked' : '' }} value='0' {{ isset($required) ? 'required' : '' }} {{ isset($disabled) ? 'disabled' : '' }} >
            @lang('main.no')
        </label>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
