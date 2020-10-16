<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helper\CurrentLang;


use Config;
use Menu;
//use App\Menu;
use DB;
use Modules\Entity\Model\Calendar\Calendar;


class FilterController extends SiteController
{
    
    public function __construct() {

      }
    

		
    public function filter(Request $request)
    {
		
		  if($request->q){
			  $q = $request->q;
		  }
		  switch($request->route){
			 
			   case 'calendars':{
				  $model =  new Calendar();
				  $name = 'imya';
				  break;
			  }
			  
			  
		  }
		  $result = $model::filter($request)->latest()->paginate(24);

		return 200;
		
		
        
		return $this->renderOutput();
		
    }
	
	
		

	
	
	
    
	
	
    
  
    
  
    
    
}
