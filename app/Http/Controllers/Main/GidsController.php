<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Requests;

use App\Repositories\SlidersRepository;
use Modules\Entity\Model\Gid\Gid;
use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\Language\Language;
use Illuminate\Support\Facades\DB;
use Config;
use Modules\Entity\Model\Speac\LibSpeac;
use Cache;
class GidsController extends SiteController
{
    
    public function __construct(SlidersRepository $s_rep) {
    	
		
		
    	parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	
    	$this->s_rep = $s_rep;
		
		$this->template = 'orda'.'.index';
				

	}
    
    
    public function index(Request $request)
    {
		
		
		
        //$sliderItems = $this->getSliders();
		
        $gid = Gid::filter($request)->with(['langGid','sights'])->latest()->paginate(9);

       
        $cities = LibCity::query()->get();
        $languages = Language::query()->get();
		$categories = LibSpeac::query()->get();

        
       $seo_desc=false;
	   $seo_title=false;
	   	   
       
	   $lang = app()->getLocale();
	   	   if(!isset($lang)){
		   $lang ='ru';
	   }
	   if(Cache::has('seo-gid-'.$lang)){
		 $item_seo = Cache::get('seo-gid-'.$lang);
		  $seo_desc= $item_seo[1];
		  $seo_title = $item_seo[0];
		  
	   }else{
		   $model= Gid::where('id','=',1)->first();
           $seo_desc=$model->seo_title;
		   $seo_title = $model->seo_description;
		}
      
		        		

		$home_page = view('orda'.'.gid.gids')->with(['gid'=>$gid,'languages'=>$languages,'cities'=>$cities,'categories'=>$categories,'request'=> $request])->render();
		
		
		
        $content=$home_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = $seo_desc;
		$this->meta_title = $seo_title;
		return $this->renderOutput();
		
    }
	function item(Request $request, Gid $gid){

        
        $sliderItems = $this->getSliders();
	    //$calenderItems = Calendar::filter($request)->latest()->paginate(24);
       
		        		

		$item_page = view('orda'.'.gid.gid-item')->with('item',$gid)->render();
		
		$content=$item_page;
        $this->vars['content']= $content;
        $this->keywords = '';
		$this->meta_desc = $gid->seo_description;
		$this->meta_title = $gid->seo_title;
		
		return $this->renderOutput();
		
	}
	
	
	
	
	
	protected function getCalendar() {
		       

		dd($this->calender_rep->get('*'));
		
    	$articles = $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.home_articles_count'));
    	
    	return $articles;
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
    
    public function getCalendars() {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
