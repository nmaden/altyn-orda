@component('mail::message')
@if (! empty($greeting))
@else
@if ($level == 'error')
# Whoops!
@else
	
# {{Lang::get('menu.email_reset_password5')}}

@endif
@endif
{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{Lang::get('menu.email_reset_password')}}


@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{Lang::get('menu.email_reset_password2')}}

@endcomponent
@endisset

{{-- Outro Lines --}}
{{Lang::get('menu.email_reset_password3')}}


{{-- Salutation --}}
@if (! empty($salutation))
лллллллллллллллллллллллллллл
@else
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
{{Lang::get('menu.email_reset_password4')}} [{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
