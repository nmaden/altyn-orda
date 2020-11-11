<?php 
namespace Modules\Entity\Model\Sights;

use Modules\Entity\Model\LibCity\LibCity;
use Illuminate\Http\Request;
//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
 
   function getAddress2Attribute($v){
	   
	     $ar= explode(',',$this->coord);
		if(count($ar) < 2){
			$ar[0] = 59.9342802;
			$ar[1] = 30.335098600000038;
		}
		 return $ar;
		  }
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

    }
	


function getPublishIndexAttribute($v){
	 return array_search($this->publish,['черновик'=>1,'активно'=>2]);
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
	  
	function getIntrotextAttribute($v){
		return $this->getTransField('introtext', $v);
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

