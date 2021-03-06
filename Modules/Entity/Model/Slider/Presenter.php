<?php 
namespace Modules\Entity\Model\Slider;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Sights\Sights;



use Cache;

trait Presenter {
	function getSightsAr(){
		return Sights::pluck('name', 'id')->toArray();
    }
	
	
	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	 
	
	function getAddress2Attribute($v){
	   
	     $ar= explode(',',$this->coord);
		if(count($ar) < 2){
			$ar[0] = 59.9342802;
			$ar[1] = 30.335098600000038;
		}
		 return $ar;
		  }
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

	
    }
	

  function getNameAttribute($v){
		return $this->getTransField('name', $v);
    }
	
	function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
    }
	


	
	
	
}

