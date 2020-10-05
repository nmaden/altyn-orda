<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\DB;

use Modules\Entity\Model\Figure\Figure;
use Cache;
class FiguresController extends SiteController
{

	public function __construct()
	{
     $this->template = 'orda' . '.index';

	}

    
    public function index(Request $request)
	{
        
		$items = Figure::filter($request)->latest()->paginate(6);
		
	   $seo_desc=false;
	   $seo_title=false;
	   $lang = app()->getLocale();
	   
	   if(!isset($lang)){
		   $lang ='ru';
	   }
	   if(Cache::has('seo-figure-'.$lang)){
		 $item_seo = Cache::get('seo-figure-'.$lang);
		  $seo_desc= $item_seo[1];
		  $seo_title = $item_seo[0];
		  
	   }else{
		   $model= Figure::where('id','=',1)->first();
           $seo_desc=$model->seo_title;
		   $seo_title = $model->seo_description;
		}
      
		
		
		
		
        $figures_page = view('orda' . '.figures.about-figures')->with(['items' => $items,'request' => $request])->render();
        $content = $figures_page;
		$this->vars['content'] = $content;
		$this->keywords = '';
		
		$this->meta_desc = $seo_desc;
		$this->meta_title = $seo_title;
		

		return $this->renderOutput();

    }
	public function item(Request $request,Figure $figure)
    {
	
	 $figures_item = view('orda' . '.figures.figures-item')->with([
	 'item'=>$figure,
	 ])->render();

	  
	    $content= $figures_item;
        $this->vars['content']= $content;
        $this->keywords = '';
		
		$this->meta_desc = $figure->seo_description;
		$this->meta_title = $figure->seo_title;

		return $this->renderOutput();

	}

	protected function getTabs()
	{


		//dd($this->gid_rep->get('*',3));
		$gids = $this->gid_rep->get('*', 3);
		return $gids;
	}
}
