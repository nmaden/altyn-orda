<?php
namespace Modules\Entity\Model\Routes;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransRoutes extends ModelParent {
    protected $table = 'trans_routes';
	 protected $table_ru = 'routes';
    protected $fillable = [ 'el_id', 'lang', 'description','name','subtitle'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'routes';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
