<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;
use Modules\Entity\Model\Sights\Sights;

use App\Repositories\GidsPepository;


use Cache;
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
	  
	  
	   $seo_desc=false;
	   $seo_title=false;
	   $lang = app()->getLocale();
	   
	   if(!isset($lang)){
		   $lang ='ru';
	   }
	   if(Cache::has('seo-sights-'.$lang)){
		 $item_seo = Cache::get('seo-sights-'.$lang);
		  $seo_desc= $item_seo[1];
		  $seo_title = $item_seo[0];
		  
	   }else{
		   $model= Sights::where('id','=',1)->first();
           $seo_desc=$model->seo_title;
		   $seo_title = $model->seo_description;
		}
      
	  
	  
	  $gids = $this->getTabs();
      $sights_page = view('orda'.'.sights.sights')->with(['items'=>$items,'gid'=>$gids,'request'=>$request])->render();
	    $content=$sights_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = $seo_desc;
		$this->meta_title = $seo_title;
		$this->request= $request;

		return $this->renderOutput();
    }
	public function item(Request $request,Sights $sight)
    {
	  
	  $gids = $this->getTabs();
      $item_page = view('orda'.'.sights.sight-item')->with(['item'=>$sight,'gid'=>$gids])->render();
	    $content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = $sight->seo_description;
		$this->meta_title = $sight->seo_title;
		
		
		return $this->renderOutput();
    }
	
	protected function getTabs() {
		       

		//dd($this->gid_rep->get('*',3));
		$gids= $this->gid_rep->get('*',10,false,['general',null]);
		return $gids;
    	
    }	
    

}
