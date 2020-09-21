<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Requests;
use App\Helper\CurrentLang;

use App\Repositories\SlidersRepository;
use App\Repositories\GidsPepository;
use App\Repositories\CalendarPepository;
use Config;
use Menu;
//use App\Menu;
use DB;
use Modules\Entity\Model\Home\Home;

class IndexController extends SiteController
{
    
    public function __construct(SlidersRepository $s_rep,GidsPepository $gids_rep, CalendarPepository $cld_rep) {

      
		$this->s_rep = $s_rep;
		$this->gid_rep = $gids_rep;
		$this->calenar_rep = $cld_rep; 
		$this->template = 'orda'.'.index';
				

	}
    

		
    public function index(Request $request)
    {
		
		$home_all=Home::get();
		
		$home = $home_all->shift();
		
		$city_f = $home->sights->where('coord', '!=', '');
		
		//dd($city_f);
		$count = count($city_f);
		 if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($city_f));

		   }
		
		
		$calenderItems = $this->getCalendar();
        $gid = $this->getTabs();
		
        $sliders = view('orda'.'.slider')->with('sliders',$home)->render();
		
		$this->vars['sliders'] = $sliders;
		  
		  
		  
		  
		  //$nav = view('orda'.'.navigation')->with(['menu'=>$menu,'a'=>33])->render();
		  //$this->vars['navigation'] = $nav;
		  
		$home_page = view('orda'.'.home')->with([
		'calendar'=>$calenderItems,
		
		'gid'=>$gid,
		'home'=>$home,
		'home_all'=>$home_all,
		'php_json'=>$php_json
		])->render();
		
		
		
        $content=$home_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
		
    }
	
	   function changeLang(Request $request){
        $old_lang = '';
		$strpos = '';
		$url = url()->previous();
		$ar = explode('/',$url);
		
		if(isset($ar[3])){
			if(in_array($ar[3],array_flip(CurrentLang::getAr()))){
			    $old_lang= $ar[3];
			}
		}
		
		$langPrefix = ltrim($request->route()->getPrefix(),'/');
		CurrentLang::set($langPrefix);
		
		
		
		if($old_lang !=''){
		
		$strpos = strpos($url,$old_lang);
		}
	
		if($strpos !=''){
		
		$url = str_replace("/".$old_lang, "/".$langPrefix, $url);

		}else{
		
		$url = str_replace("/".$_SERVER['HTTP_HOST'], "/".$_SERVER['HTTP_HOST'].'/'.$langPrefix, $url);
       }
        
        return redirect()->to($url);
    }


	protected function getTabs() {
		$gids= $this->gid_rep->get('*',3);
		return $gids;
    	
    }
	protected function getCalendar() {
		$calendar = $this->calenar_rep->get('*',20);
		return $calendar;
    	
    }
	
		

	
	
	
    
	
	
    
  
    
  
    public function getSliders() {
    	$sliders = $this->s_rep->get();
    	
    	if($sliders->isEmpty()) {
			return FALSE;
		}
		
		$sliders->transform(function($item,$key) {
			
			$item->img = 'img'.'/'.$item->img;
			return $item;
			
		});
    	
    	
    	return $sliders;
    }	
    
    
}
