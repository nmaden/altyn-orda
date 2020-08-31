<?php 
namespace Modules\Entity\Model\Routes;

use Modules\Entity\Model\LibCity\LibCity;


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

		  /*
	function getCoords(){
		return relСoords::pluck('name', 'id')->toArray();
	}
		*/ 

function getCoordsAr(){
	
	if(isset($this->coords[0])){
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

	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

		/*
		if(Cache::has('city')){
			
		$cache = Cache::get('city');
		
        return $cache;
		}else{
			
		Cache::forever('city',LibCity::pluck('name', 'id')->toArray());
		return LibCity::pluck('name', 'id')->toArray();
		}
		*/
    }
	


/*
	 function getRequirementAr(){
        return LibRequirement::pluck('name', 'id')->toArray();
    }
*/
	
	
	function getDescriptionAttribute($v){
		
		return $this->getTransField('description', $v);
	  

    }
	/*
	  function getDegreeAr(){
        return LibDegree::pluck('name', 'id')->toArray();
    }
	*/

}

