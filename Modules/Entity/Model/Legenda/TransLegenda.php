<?php
namespace Modules\Entity\Model\Legenda;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransLegenda extends ModelParent {
    protected $table = 'trans_legenda';
	 protected $table_ru = 'figure';
     protected $fillable = [ 'el_id', 'lang', 'description','name','birth','status',
	 'edited_user_id','introtext','subtitle','seo_title','seo_description'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'figure';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
