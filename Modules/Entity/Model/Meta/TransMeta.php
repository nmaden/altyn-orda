<?php
namespace Modules\Entity\Model\Meta;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransMeta extends ModelParent {
    protected $table = 'trans_general';
	 //protected $table_ru = 'home';
    protected $fillable = [ 'el_id', 'lang', 'meta_description','meta_title'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'general';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
