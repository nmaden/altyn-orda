<?php
namespace Modules\Entity\Actions\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Cache;
use Carbon\Carbon;

class CalendarUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
		
    }

    private function saveMain(){

        $ar = $this->request->all();
		$ar['user_id'] = $this->request->user()->id;
		$ar['edited_user_id'] = $this->request->user()->id;
    
	 	if ($this->request->has('photo')){
			
			if(is_file(public_path($this->model->photo))){
	          Storage::delete($this->model->photo);
            }
            $ar['photo'] = UploadPhoto::upload($this->request->photo,$this->model->photo);
	   }
        else {
            unset($ar['photo']);
		}
  
       if($this->request->social && is_array($this->request->social)){
         $ar['social'] = serialize($this->request->social);
       }
       
	   
	   if($this->request->date){
		   
		   if(strlen($this->request->date) ==4){
			   $carbon =  Carbon::createFromFormat('Y-m-d', $this->request->date.'-11-30');
               $ar['date'] = $carbon->toDateString();		   
               
		   }
	   }
	   
	   
	   if($this->request->general){

	    if($this->request->seo_description || $this->request->seo_title){
		   $title= strip_tags($this->request->seo_title);
		   $desc= strip_tags($this->request->seo_description);
		   if($this->request->lang){
			 Cache::forever('seo-calendar-'.$this->request->lang,[$title,$desc]);//сохранение безвременно
           }else{
			 Cache::forever('seo-calendar-ru',[$title,$desc]);//сохранение безвременно
		   }
	   }
	   
	}
	
        $this->model->updateOrCreate(['id'=>$this->model->id],$ar);
		
    }

 



}