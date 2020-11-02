<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cache;




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
    public $request;
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
		
				$this->vars['request']=$this->request;

        return view($this->template)->with($this->vars);
	}
	
        public function getSeo($model,$param){
		  $seo_desc=false;
	      $seo_title=false;
	      $lang = app()->getLocale();
		  if(!isset($lang)){$lang ='ru';}
		    if(Cache::has('seo-'.$param.'-'.$lang)){
		     $item_seo = Cache::get('seo-'.$param.'-'.$lang);
		     $this->meta_desc= $item_seo[1];
		     $this->meta_title = $item_seo[0];
			 	

		    }else{
			  $general= $model::where('id','=',1)->first();
			 

			  $this->meta_desc=$general->seo_description;
		      $this->meta_title = $general->seo_title;
		    }
		  }
    
    
}
