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
        <select name="{{ $name }}" id="{{ isset($id) ? $id : '' }}" class="form-control select2 {{ isset($class) ? $class  : ''}}"  {{ isset($disabled) ? 'disabled' : '' }}  multiple
                {{ isset($required) ? 'required' : '' }}>
            @foreach ($dataar as $k => $v)
			
                <option value="{{ $k }}" {{ (is_array($value) && in_array($k, $value)) || ($model->{$name} == $k && !isset($value)) ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
        </select>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
