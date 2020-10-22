<?php
namespace Modules\Entity\Actions\Gid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Route;
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
		$this->saveLang();
        $this->saveSights();
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
     	   if($this->request->general){

        if($this->request->seo_description && $this->request->seo_title){
		   if($this->request->lang){
			 
			 Cache::forever('seo-gid-'.$this->request->lang,[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно

		   }else{
		     Cache::forever('seo-gid-ru',[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно
		   }
	   }
		   }
        //$this->model->updateOrCreate(['id'=>$this->model->id],$ar);

        $this->model->fill($ar);
        $this->model->save();
    }

private function saveSights(){
if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'update')){return false;}
if(empty($this->request->sight_id)){$this->model->sights()->detach();return false;}
$check= $this->model->checkUpdateBelongMany($this->request,'sights','sight_id');
if($check){
$this->model->sights()->detach();
    foreach ($this->request->sight_id as $sight_id) {
	  $this->model->sights()->attach($sight_id);
	}
  }
}
 private function saveLang(){
  if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'update')){return false;}
   if(empty($this->request->lang_id)){$this->model->langGid()->detach();return false;}
   $check= $this->model->checkUpdateBelongMany($this->request,'langGid','lang_id');
   if($check){
     $this->model->langGid()->detach();
      foreach ($this->request->lang_id as $lang_id) {
	  $this->model->langGid()->attach($lang_id);
	}
  }
}
     
 

  
}