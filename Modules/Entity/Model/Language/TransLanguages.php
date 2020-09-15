<?php
namespace Modules\Entity\Model\Language;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransRoutes extends ModelParent {
    protected $table = 'trans_language';
	 protected $table_ru = 'trans';
    protected $fillable = [ 'el_id', 'lang', 'description','name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
