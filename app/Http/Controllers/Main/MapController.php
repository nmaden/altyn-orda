<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\SlidersRepository;
use App\Repositories\GidsPepository;
use App\Repositories\CalendarPepository;
use Config;

use Modules\Entity\Model\Home\Home;
use App\Services\FilterLib;
use Modules\Entity\Model\Sights\Sights;
use Modules\Entity\Model\Routes\Routes;

class MapController extends SiteController
{
    
    public function __construct() {
      $this->template = 'orda'.'.index';
				

	}
    
    
public function routes(Request $request){
	
	   $filter = FilterLib::get();
	   $city = $filter['city'];
	   
	   $sights_lib= $filter['sights'];
	   $routes_lib = $filter['routes'];
	
       $routes_f = Routes::filter($request)->latest()->paginate();
	   

       $request->sights=false;
	   $request->regions=false;
       $name_json = '';
	   $php_json = 0;
	   $count =0;
	   //dd($routes_f[0]->coords);
	   if(count($routes_f) > 0){
	      $coords = $routes_f[0]->coords;
		  
		  if(isset($coords->id)){
			 if($coords->auto){$this->auto = $coords->auto;}
             
          $count = count($coords->coordinate);
		  
           if($count > 0 ){
			  $php_json = urlencode(json_encode($coords->coordinate));
			  $name_json = urlencode(json_encode($coords->coordinate_name));
			  
			  
           }
		  }
          }

	      $page_map = view('orda'.'.map')->with([
		   'php_json'=>$php_json,
		   'name'=>$name_json,
		   'city'=>$city,
		   'sights_lib'=>$sights_lib,
		   'ids'=>$request,
		   'routes_lib'=> $routes_lib,

		   'count_map'=>$count])->render();

           $content=$page_map;
		   
           $this->vars['content']= $content;
           $this->keywords = '';
		   $this->meta_desc = '';
		   $this->title = '';
		   return $this->renderOutput();
		
	   
	   
	   
		
}
	
	public function sights(Request $request){
		//dd($request->all());
	   $filter = FilterLib::get();
	   $city= $filter['city'];
	   $sights_lib= $filter['sights'];
	   $routes_lib = $filter['routes'];
	   
	    $request->routes=false;


	   $city_f = Sights::filter($request)->latest()->paginate();
		$city_f = $city_f->where('coord', '!=', '');
		$count = count($city_f);
		   if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($city_f));

		   }
		   
		   $page_map = view('orda'.'.map')->with([
		   'php_json'=>$php_json,
		   'city'=>$city,
		   'sights_lib'=>$sights_lib,
		   'ids'=>$request,
		   'routes_lib'=> $routes_lib,

		   'count_map'=>$count])->render();

           $content=$page_map;
		   
           $this->vars['content']= $content;
           $this->keywords = '';
		   $this->meta_desc = '';
		   $this->title = '';
		   return $this->renderOutput();
		
		
	}




	public function map(Request $request)
    {

        $filter = FilterLib::get();
		$city = $filter['city'];
	    $sights_lib = $filter['sights'];
	    $routes_lib = $filter['routes'];
        $city_f = Sights::filter($request)->latest()->paginate();
		$city_f = $city_f->where('coord', '!=', '');
		//dd($city_f);
	    //$city_f= $city_f->toArray()['data'];
        $php_json = urlencode(json_encode($city_f));
        $ids =0;
		        

		$page_map = view('orda'.'.map')->with([
		'php_json'=>$php_json,'city'=>$city,
		'ids'=>$ids,
		'sights_lib' => $sights_lib,
		'routes_lib' => $routes_lib
        ])->render();
        $content=$page_map;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
		
    }
	
	
	
	
	
    
	
	
    
  
    
  
    public function getSliders() {
    	$sliders = $this->s_rep->get();
    	
    	if($sliders->isEmpty()) {
			return FALSE;
		}
		
		$sliders->transform(function($item,$key) {
			
			$item->img = 'img'.'/'.$item->img;
			return $item;
			
		});
    	
    	
    	return $sliders;
    }	
    
    
}
