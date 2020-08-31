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
            @if ($model->{$name})
                (уже загружено <a href="{{ fileLink($model->{$name}) }}" target="_blank">просмотреть</a>)
            @endif
        </label>
        <input type="file" name="{{ $name }}" id="{{ isset($id) ? $id : '' }}" class="form-control {{ isset($class) ? $class  : ''}}"  {{ isset($disabled) ? 'disabled' : '' }} 
                {{ isset($required) && !$model->{$name} ? 'required' : '' }} {!! isset($extra) ? $extra: '' !!} data-file_max='2'
                accept="image/x-png, image/gif, image/jpeg"  >
        <span class="help-inline ">Размер файла не должен быть более 2МБ. Изображение можно сжать  <a href="https://imagecompressor.com/ru" target="_blank">здесь</a></span>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
