<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;



use Illuminate\Support\Facades\DB;

use Modules\Entity\Model\Figure\Figure;
use Cache;
class FiguresController extends SiteController
{

	public function __construct()
	{
     $this->template = 'orda' . '.index';

	}

    
    public function index(Request $request,Figure $model)
	{
       $items = $model::filter($request)->latest()->paginate(6);
	   if(isset($model)){$this->getSeo($model,'figure');}
	   $figures_page = view('orda' . '.figures.about-figures')->with(['items' => $items,'request' => $request])->render();
       $content = $figures_page;
	   $this->vars['content'] = $content;
	   $this->request= $request;
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
