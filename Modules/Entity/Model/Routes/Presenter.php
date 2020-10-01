<?php 
namespace Modules\Entity\Model\Routes;

use Modules\Entity\Model\LibCity\LibCity;

//use Modules\Entity\Model\LibRequirement\LibRequirement;
use Lang;
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
	function getGroupAttribute($v){
		if(@unserialize($this->groups)){
			$arr = unserialize($this->groups);
			foreach($arr as $k=>$item){
				$arr[$k] = 	Lang::get('front_main.routes.price'.$item);
            }
		   
			$str = implode(',', $arr); 
			return $str;
		}else{
			return false;
		}
		
		
    }


}

