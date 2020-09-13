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
		//dd($this->langGid);
	   return $this->langGid->pluck('name','id')->toArray();
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
      function getImyaAttribute($v){
		
		return $this->getTransField('imya', $v);
    }
	
	  function getOplataAttribute($v){
		
		return $this->getTransField('oplata', $v);
    }
	

}

