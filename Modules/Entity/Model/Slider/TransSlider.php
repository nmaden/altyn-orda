<?php
namespace Modules\Entity\Model\Slider;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransSlider extends ModelParent {
    protected $table = 'trans_slider';
	 protected $table_ru = 'slider';
    protected $fillable = [ 'el_id', 'lang', 'description','name'];
    //use CheckTrans;

    function getTransTableNameAttribute(){
        return 'slider';
    }

    function getTransFiledsAttribute(){
       return  ['signature'];
    }
    
}
