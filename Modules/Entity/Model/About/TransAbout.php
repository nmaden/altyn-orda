<?php
namespace Modules\Entity\Model\About;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransAbout extends ModelParent {
    protected $table = 'trans_about';
	 protected $table_ru = 'about';
    protected $fillable = [ 'el_id', 'lang', 'description','name','date','seo_title','seo_description','editor'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'about';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
