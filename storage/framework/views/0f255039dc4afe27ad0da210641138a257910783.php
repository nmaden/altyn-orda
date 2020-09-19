<?php
if(isset($item)){
 $gid = $item;
}
$language='';

foreach($gid->langs as $gid_lang){
	
	$language .= $gid->getLangAr()[$gid_lang->lang_id].', ';
}
?>


<?php echo trim($language,', '); ?>




<?php /**PATH /home/vagrant/code/orda/resources/views/orda/gid/components/item-lang.blade.php ENDPATH**/ ?>