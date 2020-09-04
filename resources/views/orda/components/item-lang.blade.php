@php
if(isset($item)){
 $gid = $item;
}
$language='';

foreach($gid->arLangId as $gid_lang){
	$language .= $gid_lang.', ';
}

@endphp


{!! trim($language,', ') !!}



