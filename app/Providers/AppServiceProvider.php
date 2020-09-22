<?php

namespace App\Providers;
//use Spatie\BladeX\Facades\BladeX;

use Illuminate\Support\ServiceProvider;
use Blade;
use Modules\Entity\Model\SysLang\SysLang;
use View;
use App\Helper\CurrentLang;


use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibCountry\LibCountry;
use Modules\Entity\Model\LibLangStudy\LibLangStudy;
use Modules\Entity\Model\LibContinent\LibContinent;
use Cache;
use DB;
use Route;
use Menu;
use Modules\Entity\Model\Menu\Menu as Menus;

class AppServiceProvider extends ServiceProvider
{
	public $menus;
    /**
     * Register any application services.
     *
     * @return void
     */
	 
	 	public function getmenu($menu){
    
        // Route::getRoutes()
			$mBuilder = Menu::make('menu', function($m) use ($menu) {
			
			foreach($menu as $item) {
				
				if($item->parent == 0) {
                   //dd($item->name);
					$m->add($item->name,$item->path)->id($item->id);
				}
				else {
					if($m->find($item->parent)) {
						$m->find($item->parent)->add($item->name,$item->path)->id($item->id);
					}
				}
			}
			
		});
		return $mBuilder ;
	}
		
		
    public function register()
    {

				
	   View::composer('orda.*', function ($view) {
            $view->with('q_lang', new CurrentLang());
        });
		
		   View::composer('admin::*', function($view){
             $view->with('q_lang', new CurrentLang());

        });
		   View::composer('admin::*', function($view){
            $view->with('sys_lang', new SysLang());
        });
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//echo app()->getLocale();exit();
		//\App::setLocale($lang);
    $locale = request()->segment(1, '');
	$reverse = array_flip(CurrentLang::getAr());
      if($locale && in_array($locale, $reverse)) {
        \App::setLocale($locale);
     }


     $nav= Menus::get('*');
       $menu= $this->getmenu($nav);
        $this->menus = $menu;
        View::composer('orda.*', function ($view) {
         $view->with('menu',$this->menus);
        });
		/*
   LibCity::creating(function (LibCity $city) {
	   
	if(Cache::has('city')){
		
		$cache = Cache::get('city');
		
		$cache[$city->id]=$city->name;
		Cache::forever('city',$cache);
    }else{
		Cache::forever('city',LibCity::pluck('name', 'id')->toArray());
    }});	
	LibCity::updating(function (LibCity $city) {
	if(Cache::has('city')){
		$cache = Cache::get('city');
		$cache[$city->id]=$city->name;
		Cache::forever('city',$cache);
    }else{
		Cache::forever('city',LibCity::pluck('name', 'id')->toArray());
    }});
	LibCity::deleted(function (LibCity $city) {
	if(Cache::has('city')){
		$cache = Cache::get('city');
		if(count($cache) > 1){
		$arr=array($city->name);
		$cache = array_diff($cache,$arr);
		Cache::forever('city',$cache);
		}else{Cache::forget('city');}
    }});
	*/
/*----------------------------------------------------------------------*/	
	LibCountry::updating(function (LibCountry $country) {
	if(Cache::has('country')){
		$cache = Cache::get('country');
		$cache[$country->id]=$country->name;
		Cache::forever('country',$cache);
    }else{
		Cache::forever('country',LibCountry::pluck('name', 'id')->toArray());
    }});
	LibCountry::creating(function (LibCountry $country) {
	if(Cache::has('country')){
		$cache = Cache::get('country');
		$cache[$country->id]=$country->name;
		Cache::forever('country',$cache);
    }else{
		Cache::forever('country',LibCountry::pluck('name', 'id')->toArray());
    }});
	LibCountry::deleted(function (LibCountry $country) {
	if(Cache::has('country')){
		$cache = Cache::get('country');
		if(count($cache) > 1){
		$arr=array($country->name);
		$cache = array_diff($cache,$arr);
		Cache::forever('country',$cache);
		}else{Cache::forget('country');}
    }});
/*----------------------------------------------------------------------*/		
		
		
		
		
		
		Blade::directive('set',function($exp) {
        	
        	list($name,$val) = explode(',',$exp);
        	
        	return "<?php $name = $val ?>";
        	
        });
        
        //
    }
}
