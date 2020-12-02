<?php 
namespace Modules\Entity\Model\About;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Sights\Sights;



use Cache;

trait Presenter {
	function getSightsAr(){
		return Sights::pluck('name', 'id')->toArray();
    }
	
	function getEditorUnserializeAttribute(){
		if(@unserialize($this->editor)){
			return unserialize($this->editor);
		}else{
			return $this->editor;
		}
	 
	}
	
function getPhotoUnserializeAttribute(){
		if(@unserialize($this->gallery)){
			return unserialize($this->gallery);
		}else{
			return false;
		}
	 
	}

	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
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

	function getSeoTitleAttribute($v){
		return $this->getTransField('seo_title', $v);
    }
	
	function getSeoDescriptionAttribute($v){
		return $this->getTransField('seo_description', $v);
    }
	

}

