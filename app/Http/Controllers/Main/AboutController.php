<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

class AboutController extends SiteController
{
    
    public function __construct() {
    	
		parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	
        $this->template = 'orda'.'.index';
				

	}
    
    
    public function index()
    {
      
        
     
		
		$about_page = view('orda'.'.about')->render();
		
        $content=$about_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		
		return $this->renderOutput();
    }
	

}
