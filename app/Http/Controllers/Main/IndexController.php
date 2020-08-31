<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Requests;

use App\Repositories\SlidersRepository;
use App\Repositories\GidsPepository;
use App\Repositories\CalendarPepository;
use Config;

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
		 #foreignKey: "home_sigts.home_id"
		
		$home = Home::take(1)->first();
		
		$calenderItems = $this->getCalendar();
        $gid = $this->getTabs();
		
        $sliders = view('orda'.'.slider')->with('sliders',$home)->render();
		
		$this->vars['sliders'] = $sliders;
		
		$home_page = view('orda'.'.home')->with(['calendar'=>$calenderItems,'gid'=>$gid,'home'=>$home])->render();
		
		
		
        $content=$home_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
		
    }
	protected function getTabs() {
		$gids= $this->gid_rep->get('*',3);
		return $gids;
    	
    }
	protected function getCalendar() {
		$calendar = $this->calenar_rep->get('*',20);
		return $calendar;
    	
    }
	function item(Request $request, calendar $calendar){

        $sliderItems = $this->getSliders();
	    
		
        $sliders = view('orda'.'.slider')->with('sliders',$sliderItems)->render();
		$this->vars['sliders'] = $sliders;
		        		
		$item_page = view('orda'.'.calendar-item')->with('calendar',$calendar)->render();
		
		$content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
		
	}
	function items(Request $request, calendar $calendar){

        $sliderItems = $this->getSliders();
	    $calenderItems = Calendar::filter($request)->latest()->paginate(24);
        $sliders = view('orda'.'.slider')->with('sliders',$sliderItems)->render();
		$this->vars['sliders'] = $sliders;
		        		

		$item_page = view('orda'.'.calendars')->with('calendars',$calenderItems)->render();
		
		$content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
		
	}
	
	public function map()
    {
        
        $sliderItems = $this->getSliders();
        
        $sliders = view('orda'.'.slider')->with('sliders',$sliderItems)->render();
		$this->vars['sliders'] = $sliders;
		
		$page_map = view('orda'.'.map')->render();

        $content=$page_map;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';
		return $this->renderOutput();
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
