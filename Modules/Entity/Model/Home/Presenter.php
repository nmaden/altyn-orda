<?php 
namespace Modules\Entity\Model\Home;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Sights\Sights;
use Modules\Entity\Model\Calendar\Calendar;
use Modules\Entity\Model\Gid\Gid;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	function getSightsAr(){
		return Sights::pluck('name', 'id')->toArray();
    }
	
	function getGidsAr(){
		return Gid::pluck('imya', 'id')->toArray();
    }
	
		function getCalendarsAr(){
		return Calendar::pluck('name', 'id')->toArray();
    }
	
	function getArCalendarsAttribute(){
	   return $this->calendars()->pluck('calendar_id')->toArray();
     }
	 
	function getArGidsAttribute(){
	   return $this->gids()->pluck('gid_id')->toArray();
     }
	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	 function getArSlidersAttribute(){
	   //return $this->relSliders()->pluck('sight_id')->toArray();
     }
	 
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

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

