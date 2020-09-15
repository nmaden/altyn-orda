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
	public function item(Request $request)
    {
	  
	 
	 
	   $figures_item = view('orda' . '.figures.figures-item')->render();

	  
	    $content= $figures_item;
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
