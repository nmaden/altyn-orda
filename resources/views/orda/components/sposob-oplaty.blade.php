@php

$arr=[1=>'час',2=>'день'];
@endphp
{{ $item->oplata_cposob ? $arr[$item->oplata_cposob] : 'час' }}