<?php 
namespace Modules\Entity\Model\Gid;

use Modules\Entity\Model\LibCity\LibCity;

use Modules\Entity\Model\LibLanguage\LibLanguage;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	

	 function getLangAr(){
		return LibLanguage::pluck('name', 'id')->toArray();
    }
	
	 function getArLangIdAttribute(){
	   return $this->relLang()->pluck('lang_id')->toArray();
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

