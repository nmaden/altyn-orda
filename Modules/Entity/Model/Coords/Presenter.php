<?php 
namespace Modules\Entity\Model\Coords;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Routes\Routes;


//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	function getRoutersAr(){
		$routes = Routes::pluck('name', 'id')->toArray();
		
		if(count($routes) > 0){
		return $routes;
		}else{
			false;
		}
		
    }
	
	
	
	function getArSightsAttribute(){
	   return $this->sights()->pluck('sight_id')->toArray();
     }
	 
	
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();

    }
		

	
	//выводим токо не пустые координаты
	function getCheckCoordinateAttribute(){

	//выводим токо не пустые координаты
	if(@unserialize($this->coord)){
		
	  $coord= unserialize($this->coord);
	  if(is_array($coord)){
	  foreach($coord as $item){
				if($item[0]){
					$arr[] = $item;
				}
			}
	  return json_encode($arr);
	}
	}else{
		 return false;
	}

}


function getDistanceNameAttribute(){

      if(@unserialize($this->distance)){
		  if(@unserialize($this->coord_name)){
			   $coord =unserialize($this->coord);
		       $distance = unserialize($this->distance);
		   foreach($coord as $k=>$item_coord){
		    if($item_coord[0]){
				if(isset($distance[$k])){$arr2[]=$distance[$k];}
				else{$arr2[] ='';}
				}
			   }
		  return $arr2;
		  
		  }else{return false;}
	 }
}

function getCoordinateAttribute(){
	//dd($this->coordinates);
	$arr2=[];
	      if(@unserialize($this->coord)){
            $arr = unserialize($this->coord);
			  if(!is_array($arr)){return false;}
		    foreach($arr as $item){
		     if($item[0]){$arr2[]=round($item[0],6).','.round($item[1],6);}
		  }
		  return $arr2;
		   
		  }else{
			  return false;
		  }

     }
	 function getCoordinateNameAttribute(){
	//dd($this->coordinates);
	   if(@unserialize($this->coord_name)){
		  if(@unserialize($this->coord_name)){
			  $coord =unserialize($this->coord);
		      $name = unserialize($this->coord_name);
              foreach($coord as $k=>$item){
		       if($item[0]){
				if(isset($name[$k])){$arr2[]=$name[$k];}
				else{$arr2[] ='';}
				}
		      }return $arr2;
		  }
		 
	   } else{return false;}
      }
	  
function getCoordNameAttribute($v){
   //dd($this);
		return $this->getTransField('coord_name', $v);
    }
	

}

