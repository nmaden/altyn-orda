<?php 
namespace Modules\Entity\Model\Menu;
use Cache;

trait Presenter {
	

	function getNameAttribute($v){

      return $this->getTransField('name', $v);
    }
	
 function getAr(){
		return $this::where('parent','=',0)->pluck('name','id')->toArray();
	}


	
	

}

