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
        <input type="email" 
                @if (isset($group))
                    name="{{ $group }}[{{ $name }}]" 
                @else 
                    name="{{ $name }}" 
                @endif
                
                 id="{{ isset($id) ? $id : '' }}" class="form-control {{ isset($class) ? $class  : ''}}" 
                value="{{ isset($value) ? $value : $model->{$name} }}"
                {{ isset($required) ? 'required' : '' }} {{ isset($disabled) ? 'disabled' : '' }} 
                 {!! isset($extra) ? $extra: '' !!} {!! isset($checkval) ? 'data-exist_url="'.$checkval.'"': '' !!}>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
