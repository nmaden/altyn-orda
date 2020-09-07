@php
if(isset($item)){
 $gid = $item;
}
$language='';

foreach($gid->langs as $gid_lang){
	
	$language .= $gid->getLangAr()[$gid_lang->lang_id].', ';
}
@endphp


{!! trim($language,', ') !!}



