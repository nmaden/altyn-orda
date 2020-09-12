<?php 
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\University\University;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

		
    }
	 function getSityNattribute(){
        return ($this->relCity ?  $this->relCity->name : '');
    }
	
    function getNameAttribute($v){
		return $this->getTransField('name', $v);
    }
	
	function getTextAttribute($v){
		return $this->getTransField('text', $v);
    }
	


	
	
	

}

