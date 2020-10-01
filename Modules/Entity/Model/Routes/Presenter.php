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
			$flag = false;
			foreach($arr as $k=>$item){
				if($item == 1 && $this->price){
				$flag = true;
				$arr2[$k] = 	Lang::get('front_main.routes.price'.$item).' '.$this->price.' тнг ';
				}
				if($item == 2 && $this->personally_price){
					$flag = true;
                 
					$arr2[$k] = 	Lang::get('front_main.routes.price'.$item).' '.$this->personally_price.' тнг ';;

				}

            }
		   if($flag){
			  
			$str = implode(',', $arr2); 
			return $str;
		   }else{
			   return false;

		   }
		}else{
			return false;
		}
		
		
    }


}

