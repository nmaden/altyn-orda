<?php 
namespace Modules\Entity\Model\Routes;

use Modules\Entity\Model\LibCity\LibCity;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
	function getPhotoUnserializeAttribute(){
		if(@unserialize($this->photo)){
			return unserialize($this->photo);
		}else{
			return $this->photo;
		}
	 
	}
	function getGroupUnserializeAttribute(){
		if(@unserialize($this->groups)){
			return unserialize($this->groups);
		}else{
			return $this->groups;
		}
	 
	}
	
	
	/*
	   function getAddress2Attribute($v){
	   
	     $ar= explode(',',$this->coord);
		if(count($ar) < 2){
			$ar[0] = 59.9342802;
			$ar[1] = 30.335098600000038;
		}
		 return $ar;
		  }
		  */
/*
function getCoordsAr(){
	
	if(isset($this->coords[0]) && isset($this->coords[0]->coord_a))
	{
		
		return $this->coords[0];
		
	}else{
		
		
		$ar = [
		'coord_a'=>'43.21032757450292, 76.8788819999999',
		'coord_b'=>'44.21032757450292, 77.8788819999999',
		'coord_c'=>'45.21032757450292, 78.8788819999999',
		'coord_d'=>'46.21032757450292, 78.8788819999999'
		];
		return $ar;
		
		
		
		
	}
		

}		
*/

function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();
}
	function getImgPhotoAttribute($v){
		if(@unserialize($this->photo)){
		return unserialize($this->photo);
		}else{
			return $this->photo;
		}
    }

  function getNameAttribute($v){
		return $this->getTransField('name', $v);
    }
	
	function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
    }
	
	function getSubtitleAttribute($v){
		return $this->getTransField('subtitle', $v);
    }

	

}

