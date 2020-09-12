<?php 
namespace Modules\Entity\Model\Home;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Sights\Sights;


//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	function getSightsAr(){
		return Sights::pluck('name', 'id')->toArray();
    }
	
	
	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	 function getArSlidersAttribute(){
	   //return $this->relSliders()->pluck('sight_id')->toArray();
     }
		function getArMapPoint(){
			if(isset($this->sights[0]->coord)){
            $php_json = urlencode(json_encode($this->sights));
            return $php_json;
			}else{
		     $ar = [
		      'coord'=>'48.703801, 67.904896',
		       'name'=>'Мавзолей Алаша хана'
		     ];
			 $php_json = urlencode(json_encode($ar));
			 return $php_json;

		}
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
	
	function getDateAttribute($v){
		return $this->getTransField('date', $v);
    }


	
	


}

