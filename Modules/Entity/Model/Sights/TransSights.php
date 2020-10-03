<?php
namespace Modules\Entity\Model\Sights;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransSights extends ModelParent {
    protected $table = 'trans_sights';
	 protected $table_ru = 'sights';
    protected $fillable = ['el_id', 'lang', 'description','name',
	'subtitle','introtext','date','time','seo_title','seo_description'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
