@if (isset($model))
    <div class="form-group spec_teat_area">
        <label>
            @if (!isset($disabled) && $tooltip = Modules\Entity\Services\TooltipGenerator::get($model->title, $model->getLabel($name)))
                <i class="icon-help" data-popup="popover" data-trigger="hover" data-content='{{ $tooltip }}'></i>
            @endif
            {{ $model->getLabel($name) }}
            @if (isset($required))
                <span class="text-danger">*</span>
            @endif
        </label>
        @if (isset($lang) && $lang == 'ru')
            <span class="help-topline ">на русском</span>
            <textarea
                name="{{ $name }}"
                id="{{ isset($id) ? $id : '' }}" 
                class="form-control wysihtml5 wysihtml5-default {{ isset($class) ? $class  : ''}}" 
                {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) ? 'required' : '' }} 
                {!! isset($extra) ? $extra: '' !!} 
                {!! isset($checkval) ? 'data-exist_url="'.$checkval.'"': '' !!}>{!! isset($value) ? $value : $model->{$name} !!}</textarea>

        @elseif (isset($lang) && $lang == 'kz')
            <span class="help-topline ">на казахском</span>
            <textarea
                name="kz[{{ $name }}]"
                id="{{ isset($id) ? $id : '' }}" 
                class="form-control wysihtml5 wysihtml5-default {{ isset($class) ? $class  : ''}}" 
                {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) ? 'required' : '' }} 
                {!! isset($extra) ? $extra: '' !!} 
                {!! isset($checkval) ? 'data-exist_url="'.$checkval.'"': '' !!}>{!! $model->relTransKz ? $model->relTransKz->{$name} : '' !!}</textarea>
        @elseif (isset($lang) && $lang == 'en')
            <span class="help-topline ">на английском</span>
            <textarea
                name="en[{{ $name }}]"
                id="{{ isset($id) ? $id : '' }}" 
                class="form-control wysihtml5 wysihtml5-default {{ isset($class) ? $class  : ''}}" 
                {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) ? 'required' : '' }} 
                {!! isset($extra) ? $extra: '' !!} 
                {!! isset($checkval) ? 'data-exist_url="'.$checkval.'"': '' !!}>{!! $model->relTransEn ? $model->relTransEn->{$name} : '' !!}</textarea>
        @else 
            <textarea 
                @if (isset($group))
                    name="{{ $group }}[{{ $name }}]" 
                @else 
                    name="{{ $name }}" 
                @endif
                 id="{{ isset($id) ? $id : '' }}" 
                class="wysihtml5 wysihtml5-default form-control {{ isset($class) ? $class  : ''}}" 
                {{ isset($required) ? 'required' : '' }}  {{ isset($disabled) ? 'disabled' : '' }} 
                {!! isset($extra) ? $extra: '' !!}    rows="24" cols="4">{!! isset($value) ? $value : $model->{$name} !!}</textarea>

        @endif
      
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
