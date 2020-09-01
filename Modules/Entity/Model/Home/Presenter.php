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

				return $this->sights;
			}else{
		     $ar = [
		      'coord'=>'48.703801, 67.904896',
		       'name'=>'Мавзолей Алаша хана'
		     ];
		    return $ar;
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

		/*
		if(Cache::has('city')){
			
		$cache = Cache::get('city');
		
        return $cache;
		}else{
			
		Cache::forever('city',LibCity::pluck('name', 'id')->toArray());
		return LibCity::pluck('name', 'id')->toArray();
		}
		*/
    }
	


/*
	 function getRequirementAr(){
        return LibRequirement::pluck('name', 'id')->toArray();
    }
*/
	
	
	function getDescriptionAttribute($v){
		
		return $this->getTransField('description', $v);
	  

    }
	/*
	  function getDegreeAr(){
        return LibDegree::pluck('name', 'id')->toArray();
    }
	*/

}

