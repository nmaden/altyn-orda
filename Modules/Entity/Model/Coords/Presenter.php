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
		
function getCheckCoordinateAttribute(){
	//выводим токо не пустые координаты
	if($this->coord){
	foreach(json_decode($this->coord) as $item){
				if($item[0]){
					$arr[] = $item;
				}
			}
						return json_encode($arr);

	}
		return false;
}
function getCoordinateMetrAttribute(){
	//формируем масив для вывода километров и названий
	
   $arr = $this->coordinate;
   $arr2 = json_decode($this->metr);
   $arr3 = $this->coordinate_name;
   $arr4=[];
 if(isset($arr2[1])){
foreach($arr as $k=>$item){
	  foreach($arr2 as $v){
	   $c= explode(',',$v[1]);
	   $c[0]=round($c[0],6);
	      

	   $c[1]=round($c[1],6);
       $c = implode(',',$c);
	  if($item == $c){
		  array_push($v,$arr3[$k]);
		  $arr4[]= $v;
	  }
     }
	};
			return $arr4;

}else{
	return false;
}
		//выводим расстояния


}

function getCoordinateAttribute(){
	//dd($this->coordinates);
	$arr2=[];
	
	   if($this->coord){
		  $arr =json_decode($this->coord);
		 
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
		   $coord =json_decode($this->coord);
		   $arr = unserialize($this->coord_name);

            foreach($coord as $k=>$item){
		    if($item[0]){
				if(isset($arr[$k])){$arr2[]=$arr[$k];}
				else{
					$arr2[] ='';
				}
				}
		  }
		  
		   
		   return $arr2;
         }else{
			
			 
			 return false;
		 
     }
	 }
function getCoordNameAttribute($v){
   //dd($this);
		return $this->getTransField('coord_name', $v);
    }
	

}

