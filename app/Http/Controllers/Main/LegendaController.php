<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use Modules\Entity\Model\Legenda\Legenda;

use Cache;

class LegendaController extends SiteController
{

	public function __construct()
	{
     $this->template = 'orda' . '.index';

	}

    
    public function index(Request $request,Legenda $model)
	{
       
	   $items = $model::filter($request)->latest()->paginate(6);
	   if(isset($model)){$this->getSeo($model,'legenda');}
	   $figures_page = view('orda' . '.legenda.catalog')->with(['items' => $items,'request' => $request])->render();
       $content = $figures_page;
	   $this->vars['content'] = $content;
	   $this->request= $request;
       return $this->renderOutput();
	   

    }


	public function item(Request $request,Legenda $legenda)
    {
	 $item = view('orda' . '.legenda.item')->with([
	 'item'=>$legenda,
	 ])->render();
     $this->vars['content']= $item;
     $this->keywords = '';
	 $this->meta_desc = $legenda->seo_description;
	 $this->meta_title = $legenda->seo_title;
     return $this->renderOutput();

	}


	
}
