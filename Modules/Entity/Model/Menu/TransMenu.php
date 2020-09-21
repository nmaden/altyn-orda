<?php
namespace Modules\Entity\Model\Menu;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransMenu extends ModelParent {
    protected $table = 'trans_menu';
	 protected $table_ru = 'menus';
     protected $fillable = [ 'el_id', 'lang', 'name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'menus';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
