@if (isset($model))
    <div class="form-group">
        <label>
            @if (!isset($lang) || $lang == 'ru')
                @if (!isset($disabled) && $tooltip = Modules\Entity\Services\TooltipGenerator::get($model->title, $model->getLabel($name)))
                    <i class="icon-help" data-popup="popover" data-trigger="hover" data-content='{{ $tooltip }}'></i>
                @endif
				
                {{ $model->getLabel($name) }}
            @else 
                &nbsp;&nbsp;&nbsp;
            @endif
            @if (isset($required))
                <span class="text-danger">*</span>
            @endif
        </label>
        @if (isset($lang) && $lang == 'ru')
            <span class="help-topline ">на русском</span>
        @elseif (isset($lang) && $lang == 'kz')
            <span class="help-topline ">на казахском</span>
        @elseif (isset($lang) && $lang == 'en')
            <span class="help-topline ">на английском</span>
        @endif
        <input type="text" 
                @if (isset($lang) && $lang == 'kz')
                    name="kz[{{ $name }}]"
                    value="{{ $model->relTransKz ? $model->relTransKz->{$name} : '' }}" 
                @elseif (isset($lang) && $lang == 'en')
                    name="en[{{ $name }}]"
                    value="{{ $model->relTransEn ? $model->relTransEn->{$name} : '' }}" 
                @else 
                    @if (isset($group))
                        name="{{ $group }}[{{ $name }}]" 
                    @else 
                        name="{{ $name }}" 
                    @endif 
                    
                    value="{{ isset($value) ? $value : $model->{$name} }}" 
                @endif
        
                id="{{ isset($id) ? $id : '' }}" class="form-control {{ isset($class) ? $class  : ''}}" 
                {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) ? 'required' : '' }} {!! isset($extra) ? $extra: '' !!} {!! isset($checkval) ? 'data-exist_url="'.$checkval.'"': '' !!}>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
