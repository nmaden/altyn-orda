<?php 
namespace Modules\Entity\Model\Sights;

use Modules\Entity\Model\LibCity\LibCity;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
 
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
	
	function getNameAttribute($v){
		return $this->getTransField('name', $v);
	  }
	
	function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
	  }
	  
	function getSubtitleAttribute($v){
		return $this->getTransField('subtitle', $v);
	  }
	  
	function getIntrotextAttribute($v){
		return $this->getTransField('introtext', $v);
	  }
	  
	function getDateAttribute($v){
		return $this->getTransField('date', $v);
	  }
	/*
	  function getDegreeAr(){
        return LibDegree::pluck('name', 'id')->toArray();
    }
	*/

}

