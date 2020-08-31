<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;
use Modules\Entity\Model\Routes\Routes;

use App\Repositories\GidsPepository;

use App\Http\Controllers\SiteController;
use Modules\Entity\Model\Categories\Categories;
use Modules\Entity\Model\LibCity\LibCity;
use Illuminate\Support\Facades\DB;


class RoutesController extends SiteController
{
    
    public function __construct(GidsPepository $gid_rep) {
    	
	
    	 
		$this->gid_rep = $gid_rep;
        $this->template = 'orda'.'.index';
				

	}
    
    
    public function index(Request $request)
    {
		
		$items = Routes::filter($request)->latest()->paginate(10);
		
		$cities = LibCity::query()->get();
		$categories = DB::table('categories')->get();

	  $gids = $this->getTabs();
      $sights_page = view('orda'.'.routes.routes')->with(['items'=>$items, 'cities'=>$cities, 'categories'=>$categories, 'gid'=>$gids,'request'=>$request])->render();
	  
	  
	    $content=$sights_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		
		return $this->renderOutput();
    }
	public function item(Request $request,Routes $routes)
    {
	  
	  $gids = $this->getTabs();
      $item_page = view('orda'.'.routes.route-item')->with(['item'=>$routes,'gid'=>$gids])->render();
	    $content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		
		return $this->renderOutput();
    }
	
	protected function getTabs() {
		       

		//dd($this->gid_rep->get('*',3));
		$gids= $this->gid_rep->get('*',3);
		return $gids;
    	
    }	
    

}
