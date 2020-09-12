<?php
namespace Modules\Entity\Model\Home;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransHome extends ModelParent {
    protected $table = 'trans_home';
	 protected $table_ru = 'home';
    protected $fillable = [ 'el_id', 'lang', 'description','name','date'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
