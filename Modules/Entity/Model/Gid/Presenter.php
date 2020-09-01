<?php 
namespace Modules\Entity\Model\Gid;

use Modules\Entity\Model\LibCity\LibCity;

use Modules\Entity\Model\LibLanguage\LibLanguage;

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
    }
	

    function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
	  }
	  
      function getNameAttribute($v){
		
		return $this->getTransField('name', $v);
    }
    

}

