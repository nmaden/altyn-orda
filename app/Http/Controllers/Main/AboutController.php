<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use Modules\Entity\Model\About\About;

class AboutController extends SiteController
{
    
    public function __construct() {
    	
		parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	
        $this->template = 'orda'.'.index';
				

	}
    
    
    public function index()
    {
      
       $about = About::take(1)->first();
       $about_page = view('orda'.'.about')->with(['about'=>$about])->render();
		
        $content=$about_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		
		$this->meta_desc = $about->seo_description;
		$this->meta_title = $about->seo_title;
		
		return $this->renderOutput();
    }
	

}
