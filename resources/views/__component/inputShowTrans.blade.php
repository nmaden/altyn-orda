@if (isset($model))
    <div class="form-group">
        <label>
            {{ $model->getLabel($name) }}
            @if (isset($lang) && $lang == 'kz')
                (на казахском)
            @elseif (isset($lang) && $lang == 'en')
                (на английском)
            @else 
                (на русском)
            @endif
        </label>

        @php 
            $val = $model->{$name};
            if (isset($lang) && $lang == 'kz')
                $val = ($model->relTransKz ? $model->relTransKz->{$name} : '' );
            else if (isset($lang) && $lang == 'en')
                $val = ($model->relTransEn ? $model->relTransEn->{$name} : '' );
        @endphp
        <pre class="p_5 pre_show_modal">{!! $val !!}</pre>
    </div>
@else 
    <p>Не указан обьект для фильтра</p>
@endif
