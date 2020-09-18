<?php
if(isset($item)){
 $gid = $item;
}
$language='';

foreach($gid->arLangId as $gid_lang){
	$language .= $gid_lang.', ';
}

?>


<?php echo trim($language,', '); ?>




<?php /**PATH /home/vagrant/code/orda/resources/views/orda/components/item-lang.blade.php ENDPATH**/ ?>