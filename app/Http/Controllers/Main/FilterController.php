<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helper\CurrentLang;


use Config;
use Menu;
//use App\Menu;
use DB;


class FilterController extends SiteController
{
    
    public function __construct() {

      }
    

		
    public function filter(Request $request)
    {
		return 200;
		
		
        
		return $this->renderOutput();
		
    }
	
	
		

	
	
	
    
	
	
    
  
    
  
    
    
}
