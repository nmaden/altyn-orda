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
	
	
function getCoordNameAttribute($v){
	
		return $this->getTransField('coord_name', $v);
    }
	
}

