<?php
namespace Modules\Entity\Model\Figure;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransFigure extends ModelParent {
    protected $table = 'trans_figure';
	 protected $table_ru = 'figure';
     protected $fillable = [ 'el_id', 'lang', 'descriptionfigure','namefigure','birth','status',
	 'edited_user_id','introtext','subtitle','seo_title','seo_description'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'figure';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
