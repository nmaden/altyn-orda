<?php 
namespace Modules\Entity\Model\Language;

use Modules\Entity\Model\LibCity\LibCity;


//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	   function getAddress2Attribute($v){
	   
	     $ar= explode(',',$this->coord);
		
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

