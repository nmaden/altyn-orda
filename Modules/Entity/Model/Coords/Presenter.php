<?php 
namespace Modules\Entity\Model\Coords;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Routes\Routes;


//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	function getRoutersAr(){
		return Routes::pluck('name', 'id')->toArray();
    }
	
	
	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	 
	
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

    }
	
function getCoordAttribute(){
	   if(@unserialize($this->coord)){
		   
           return unserialize($this->coord);
         }else{
		   return false;
		 }
     }
	 


}

