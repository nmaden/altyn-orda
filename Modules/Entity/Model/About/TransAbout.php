<?php
namespace Modules\Entity\Model\About;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransAbout extends ModelParent {
    protected $table = 'trans_routes';
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
