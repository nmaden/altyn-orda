@if (isset($model))
    @php 
        $val = (isset($value) ? $value : $model->{$name});
    @endphp

    @if ($val)
        <div class="form-group">
            <label>
                {{ $model->getLabel($name) }}
            </label>

            <pre class="p_5 pre_show_modal">{!! $val !!}</pre>
        </div>
    @endif
@else 
    <p>Не указан обьект для фильтра</p>
@endif
