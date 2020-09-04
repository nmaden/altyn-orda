<?php 
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\University\University;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
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
	 function getSityNattribute(){
        return ($this->relCity ?  $this->relCity->name : '');
    }


/*
	 function getRequirementAr(){
        return LibRequirement::pluck('name', 'id')->toArray();
    }
*/
	function getSignatureAttribute($v){
		return $this->getTransField('signature', $v);
    }
	
	function getDescriptionAttribute($v){
		if($this->lang == 'ru'){
			 return ($this->relApplication ?  $this->relApplication->description : '');
		}
		return $this->getTransField('description', $v);
	  

    }
	/*
	  function getDegreeAr(){
        return LibDegree::pluck('name', 'id')->toArray();
    }
	*/

}

