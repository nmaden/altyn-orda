<?php
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransCalendar extends ModelParent {
    protected $table = 'trans_gallery';
	 protected $table_ru = 'gallery';
    protected $fillable = [ 'el_id', 'lang', 'name','text','title'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'galleries';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
