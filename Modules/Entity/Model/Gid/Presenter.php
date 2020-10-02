<?php 
namespace Modules\Entity\Model\Gid;

use Modules\Entity\Model\LibCity\LibCity;

use Modules\Entity\Model\LibLanguage\LibLanguage;

use Modules\Entity\Model\Sights\Sights;

use Cache;

use Lang;

trait Presenter {

	function getSightsAr(){
		return Sights::pluck('name', 'id')->toArray();
    }
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	function getPhotoUnAttribute(){

		if(@unserialize($this->gallery)){
			return unserialize($this->gallery);
		}else{
			return $this->gallery;
		}
	 
	}

		
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
	
    function getImyaAttribute($v){
		return $this->getTransField('imya', $v);
	  }
	  
    function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
	  }
	  
      function getNameAttribute($v){
		  return $this->getTransField('name', $v);
    }
	
      function getOplataAttribute($v){
		  return Lang::get('front_main.oplata_'.$v);
		  
		}
		function getCurrencyAttribute($v){
		  		return $this->getTransField('currency', $v);

		  
		}
		
    
}

