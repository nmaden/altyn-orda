@php

$arr=[1=>'час',2=>'день'];
@endphp
{{ $item->oplata ? $arr[$item->oplata] : 'час' }}