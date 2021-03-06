<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use Config;
use Modules\Entity\Model\Routes\Routes;
use App\Repositories\GidsPepository;
use Modules\Entity\Model\Categories\Categories;
use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Catroutes\Catroutes;
use Illuminate\Support\Facades\DB;
use Cache;

class RoutesController extends SiteController
{

	public function __construct(GidsPepository $gid_rep)
	{



		$this->gid_rep = $gid_rep;
		$this->template = 'orda' . '.index';
	}

    
    
  
		
		



	public function index(Request $request,Routes $model)
	{

	   $items = $model::filter($request)->latest()->paginate(9);
	   if(isset($model)){$this->getSeo($model,'routes');}
       $cities = LibCity::query()->get();
	   $categories = Catroutes::query()->get();
       $gids = $this->getTabs();
		$sights_page = view('orda' . '.routes.routes')->with(['items' => $items, 'cities' => $cities, 'categories' => $categories, 'gid' => $gids, 'request' => $request])->render();
        $content = $sights_page;
		$this->vars['content'] = $content;
		$this->request= $request;
        return $this->renderOutput();

    }
	public function item(Request $request,Routes $routes)
    {
	  
	  $gids = $this->getTabs();
	  $coords = $routes->coords;
	  $php_json = '';
	  $name_json='';
	  if($coords){
	  if(isset($coords->auto)){if($coords->auto){$this->auto = $coords->auto;}}
	  $count = count($coords->coordinate);

		   if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($coords->coordinate));
			  $name_json = urlencode(json_encode($coords->coordinate_name));

		   }
	}
	   if($this->auto == 1){
		   		   $page = 'route-item-defauit';

	   }else{
		   
		   		   $page = 'route-item';


	   }
	   $item_page = view('orda'.'.routes.'.$page)->with([
	   'item'=>$routes,'gid'=>$gids,'php_json'=>$php_json,'name'=>$name_json])->render();
	  
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
