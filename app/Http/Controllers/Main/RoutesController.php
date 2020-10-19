<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;
use Modules\Entity\Model\Routes\Routes;

use App\Repositories\GidsPepository;


use Modules\Entity\Model\Categories\Categories;
use Modules\Entity\Model\LibCity\LibCity;
use Illuminate\Support\Facades\DB;
use Cache;

class RoutesController extends SiteController
{

	public function __construct(GidsPepository $gid_rep)
	{



		$this->gid_rep = $gid_rep;
		$this->template = 'orda' . '.index';
	}

    
    
  
		
		



	public function index(Request $request)
	{

		$items = Routes::filter($request)->latest()->paginate(9);
		
       $seo_desc=false;
	   $seo_title=false;
	   $lang = app()->getLocale();
	   
	   if(!isset($lang)){
		   $lang ='ru';
	   }
	   if(Cache::has('seo-routes-'.$lang)){

		 $item_seo = Cache::get('seo-routes-'.$lang);
		  $seo_desc= $item_seo[1];
		  $seo_title = $item_seo[0];
		  
	   }else{
		   $model= Routes::where('id','=',1)->first();
           $seo_desc=$model->seo_title;
		   $seo_title = $model->seo_description;
		}
      

		$cities = LibCity::query()->get();
		$categories = DB::table('routes_categories')->get();

		

		$gids = $this->getTabs();
		$sights_page = view('orda' . '.routes.routes')->with(['items' => $items, 'cities' => $cities, 'categories' => $categories, 'gid' => $gids, 'request' => $request])->render();


		$content = $sights_page;
		$this->vars['content'] = $content;
		$this->keywords = '';
        $this->meta_desc = $seo_desc;
		$this->meta_title = $seo_title;
		$this->request= $request;

		return $this->renderOutput();

    }
	public function item(Request $request,Routes $routes)
    {
	  
	  $gids = $this->getTabs();
	  $coords = $routes->coords->sortBy('undex_coord')->toArray();
	 
	  $count = count($coords);
		   if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($coords));

		   }
		   
	   $item_page = view('orda'.'.routes.route-item')->with([
	   'item'=>$routes,
	   'gid'=>$gids,
	   'php_json'=>$php_json
	   ])->render();
	  
	    $content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		
		$this->meta_desc = $routes->seo_description;
		$this->meta_title = $routes->seo_title;
		

		return $this->renderOutput();

	}

	protected function getTabs()
	{


		//dd($this->gid_rep->get('*',3));
		$gids = $this->gid_rep->get('*', 3,false,['general',null]);
		return $gids;
	}
}
