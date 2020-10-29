<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

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
    
    public function __construct(SlidersRepository $s_rep) {

      
		$this->s_rep = $s_rep;
		$this->template = 'orda'.'.index';
				

	}
    

		
    public function index(Request $request)
    {
		
		$home_all=Home::with(['sights','calendars','gids'])->get();
		$home = $home_all->shift();
		
        $city_f = $home->sights->where('coord', '!=', '');
        $count = count($city_f);
		 if($count <=0 ){
			   $php_json = 0;
		   }else{
			  $php_json = urlencode(json_encode($city_f));

		   }
		$sliders = view('orda'.'.slider')->with('sliders',$home)->render();
		$this->vars['sliders'] = $sliders;
		  
		  
		$home_page = view('orda'.'.home')->with([
		'home'=>$home,
		'home_all'=>$home_all,
		'php_json'=>$php_json
		])->render();
		
		
		
        $content=$home_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = $home->seo_description;
		$this->meta_title = $home->seo_title;
		
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
		$gids= $this->gid_rep->get('*',10);
		return $gids;
    	
    }
	protected function getCalendar() {
		$calendar = $this->calenar_rep->get('*',20);
		return $calendar;
    	
    }
	
		

	
	
	
    
	
	
    
  
    
  
    
    
}
