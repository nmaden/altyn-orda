<?php
namespace Modules\Entity\Model\Coords;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransCoords extends ModelParent {
    protected $table = 'trans_coors';
	 protected $table_ru = 'coord';
    protected $fillable = [ 'el_id', 'lang', 'coord_name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'lib_coord';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
