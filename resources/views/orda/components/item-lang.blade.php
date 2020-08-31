@php
if(isset($item)){
 $gid = $item;
}
$language='';

foreach($gid->getLangAr() as $gid_lang){
	$language .= $gid_lang.', ';
}

@endphp


{!! trim($language,', ') !!}



