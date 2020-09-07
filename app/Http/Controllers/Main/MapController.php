<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
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
	
	   //dd($request->all());
	   $routes_f = Routes::filter($request)->latest()->paginate();
       $request->sights=false;
	   $request->regions=false;

	   $php_json = 0;
	   $count =0;
	   if(count($routes_f) > 0){
	   foreach($routes_f as $item){
		   $arr = $item->coords->toArray();
	   }
	   		  	

	   	$count = count($arr);
		   if($count > 0 ){
			   $php_json = urlencode(json_encode($arr));

		   }
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
	
	public function sights(Request $request){
		//dd($request->all());
	   $filter = FilterLib::get();
	   $city= $filter['city'];
	   $sights_lib= $filter['sights'];
	   $routes_lib = $filter['routes'];
	   
	  $request->routes=false;


	   $city_f = Sights::filter($request)->latest()->paginate();



     
	   //dd($city_f);
	   	//dd($request->all());
	   	//dd($city_f->toArray()['data']);

      
       $city_f= $city_f->toArray()['data'];
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




		public function city(Request $request,$id){
			
		   $filter = FilterLib::get();
		   $city= $filter['city'];
		   $sights_lib= $filter['sights'];

		   
		    
		   if($id == 'all'){
			   $city_f = Sights::filter($request)->latest()->paginate();

		   }else{
			  $request->city_id=$id;
              $city_f = Sights::filter($request)->latest()->paginate();

		   }
		   $city_f= $city_f->toArray()['data'];
		   $count = count($city_f);
		   if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($city_f));

		   }
		   
		   //dd(count($city_f));
		   
		   
           $page_map = view('orda'.'.map')->with([
		   'php_json'=>$php_json,
		   'city'=>$city,
		   'sights_lib'=>$sights_lib,
		   'ids'=>$id,
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
        //dd($routes_lib);
		
		//$home = Home::take(1)->first();
		

		$city_f = Sights::filter($request)->latest()->paginate();
	    $city_f= $city_f->toArray()['data'];
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
