<?php
namespace Modules\Entity\Model\Social;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransSocial extends ModelParent {
    protected $table = 'trans_social';
	 protected $table_ru = 'figure';
     protected $fillable = [ 'el_id', 'lang', 'hint','photo','name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'figure';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
