<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:13
 */

namespace App\Services\Page;
use App\Helper\CurrentLang;
use Route;

class Page
{
    public function page_calc($arr=false) {
	
	   if($arr){
		  $route1 = Route::currentRouteName();
		  if(in_array($route1,$arr)){
			  return true;
		  }
		   
	   }
          return false;
    }
	  public function page_name() {
		 $route1 = Route::currentRouteName();
         if($route1){
			 return $route1;
		 }else{
			 return false;
		 }
	  }

	
	
}