<?php
namespace Modules\Entity\Model\Sights;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransSights extends ModelParent {
    protected $table = 'trans_gids';
	 protected $table_ru = 'gids';
    protected $fillable = [ 'el_id', 'lang', 'description','name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
