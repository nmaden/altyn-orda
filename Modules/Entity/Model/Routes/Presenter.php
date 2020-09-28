<?php 
namespace Modules\Entity\Model\Routes;

use Modules\Entity\Model\LibCity\LibCity;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
	function getPhotoUnserializeAttribute(){
		if(@unserialize($this->gallery)){
			return unserialize($this->gallery);
		}else{
			return $this->gallery;
		}
	 
	}
	function getGroupUnserializeAttribute(){
		if(@unserialize($this->groups)){
			return unserialize($this->groups);
		}else{
			return $this->groups;
		}
	 
	}
	

  function getRelDataObj(){
        if (!$this->coords){
			dd(16);
			 //$this->rel_data_obj = new UniversityData();
		}
           
        else if (!$this->rel_data_obj){
			//$this->rel_data_obj = $this->relData;
		}
           
        //dd($this->coords[0]->setLocale($this->lang));
    
        return $this->rel_data_obj;
    }
  





function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();
}
	function getImgPhotoAttribute($v){
		if(@unserialize($this->gallery)){
		return unserialize($this->gallery);
		}else{
			return $this->gallery;
		}
    }

  function getNameAttribute($v){
   //dd($this);
		return $this->getTransField('name', $v);
    }
	
	function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
    }
	
	function getSubtitleAttribute($v){
		return $this->getTransField('subtitle', $v);
    }

	

}

