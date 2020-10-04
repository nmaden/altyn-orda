<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;





class SiteController extends Controller
{
    //
    
   
    protected $c_rep;
	protected $calender_rep;
    protected $gid_rep;
    protected $calenar_rep;
    protected $keywords;
	protected $meta_desc;
	protected $title;
    
    protected $temlate;
    
    protected $vars = array();

    protected $contentRightBar = FALSE;
	protected $contentLeftBar = FALSE;
	
    
    protected $bar = 'no';
    
    
    public function __construct() {
	
	}
	
	
	protected function renderOutput() {
		
	
	
		$this->vars['keywords'] = $this->keywords;
		if(isset($this->meta_desc)){
		$this->vars['meta_desc']=$this->meta_desc;
		}
		if(isset($this->meta_title)){
		$this->vars['meta_title']=$this->meta_title;
        }
		
		$footer = view('orda'.'.footer')->render();
		$this->vars['footer']=$footer;
        return view($this->template)->with($this->vars);
	}
	

    
    
}
