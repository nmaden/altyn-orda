<?php
namespace Modules\Entity\Model\Menu;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransMenu extends ModelParent {
    protected $table = 'trans_figure';
	 protected $table_ru = 'figure';
     protected $fillable = [ 'el_id', 'lang', 'descriptionfigure','namefigure','birth','status','edited_user_id','introtext','subtitle'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'figure';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
