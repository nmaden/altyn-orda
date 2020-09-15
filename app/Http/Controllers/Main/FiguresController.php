<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\DB;

use Modules\Entity\Model\Figure\Figure;

class FiguresController extends SiteController
{

	public function __construct()
	{
     $this->template = 'orda' . '.index';

	}

    
    public function index(Request $request)
	{

		$items = Figure::filter($request)->latest()->paginate(10);
		
        $figures_page = view('orda' . '.figures.about-figures')->with(['items' => $items,'request' => $request])->render();
        $content = $figures_page;
		$this->vars['content'] = $content;
		$this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';

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
		
		$this->meta_desc = '';
		$this->title = '';

		return $this->renderOutput();

	}

	protected function getTabs()
	{


		//dd($this->gid_rep->get('*',3));
		$gids = $this->gid_rep->get('*', 3);
		return $gids;
	}
}
