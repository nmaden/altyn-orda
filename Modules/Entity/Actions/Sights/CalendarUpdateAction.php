<?php
namespace Modules\Entity\Actions\Sights;

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
		if($this->request->latitude && $this->request->longitude){
			$ar['coord']= $this->request->latitude.','.$this->request->longitude;
		}
    
	 	if ($this->request->has('photo')){
			
			if(is_file(public_path($this->model->photo))){
	          Storage::delete($this->model->photo);
            }
            $ar['photo'] = UploadPhoto::upload($this->request->photo,$this->model->photo);
	   }
        else {
            unset($ar['photo']);
		}
       if($this->request->seo_description && $this->request->seo_title){
		   if($this->request->lang){
			 
			 Cache::forever('seo-sights-'.$this->request->lang,[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно

		   }else{
			   
		     Cache::forever('seo-sights-ru',[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно
		   }
	   }
	   
        $this->model->fill($ar);
        $this->model->save();
        
        //$this->model->updateOrCreate(['id'=>$this->model->id],$ar);
		
    }

 



}