<?php
namespace Modules\Entity\Model\Legenda;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransLegenda extends ModelParent {
    protected $table = 'trans_legenda';
	 protected $table_ru = 'legenda';
     protected $fillable = [ 'el_id', 'lang', 'description','name','birth','status',
	 'edited_user_id','subtitle','seo_title','seo_description','gallery_title'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'figure';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
