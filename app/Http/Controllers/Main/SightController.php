<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;
use Modules\Entity\Model\Sights\Sights;

use App\Repositories\GidsPepository;

use App\Http\Controllers\SiteController;

class SightController extends SiteController
{
    
    public function __construct(GidsPepository $gid_rep) {
    	
		parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	 
		$this->gid_rep = $gid_rep;
        $this->template = 'orda'.'.index';
				

	}
    
    
    public function index(Request $request)
    {
		
	  $items = Sights::filter($request)->latest()->paginate(9);
	  $gids = $this->getTabs();
      $sights_page = view('orda'.'.sights.sights')->with(['items'=>$items,'gid'=>$gids,'request'=>$request])->render();
	    $content=$sights_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		
		return $this->renderOutput();
    }
	public function item(Request $request,Sights $sight)
    {
	  
	  $gids = $this->getTabs();
      $item_page = view('orda'.'.sights.sight-item')->with(['item'=>$sight,'gid'=>$gids])->render();
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
