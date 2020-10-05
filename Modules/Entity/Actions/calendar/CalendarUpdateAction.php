<?php
namespace Modules\Entity\Actions\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Cache;
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
       
	    if($this->request->seo_description && $this->request->seo_title){
		   if($this->request->lang){
			 
			 Cache::forever('seo-calendar-'.$this->request->lang,[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно

		   }else{
		     Cache::forever('seo-calendar-ru',[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно
		   }
	   }
	   
        $this->model->updateOrCreate(['id'=>$this->model->id],$ar);
		
    }

 



}