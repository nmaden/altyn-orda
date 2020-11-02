<?php
namespace Modules\Entity\Actions\Routes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Route;
use Cache;
use Intervention\Image\Facades\Image as ImageInt;
class CalendarUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
		//dd($this->request->all());exit();
		$this->saveCoords();
        //$this->saveRequirement();
    }

    private function saveMain(){
					

		$ar = $this->request->all();
		$ar['user_id'] = $this->request->user()->id;
      	$ar['edited_user_id'] = $this->request->user()->id;
		if($this->request->props_3){
        $ar['props_3'] = strip_tags($ar['props_3']);
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

        
        if(is_array($this->request->groups) && !empty($this->request->groups)){
			
			$ar['groups'] = serialize($this->request->groups);
			
		}
		
		if($this->request->general){

		if($this->request->seo_description && $this->request->seo_title){
		   $title= strip_tags($this->request->seo_title);
		   $desc= strip_tags($this->request->seo_description);
		   
		   if($this->request->lang){
			 Cache::forever('seo-routes-'.$this->request->lang,[$title,$desc]);//сохранение безвременно
          }else{
			 Cache::forever('seo-routes-ru',[$title,$desc]);//сохранение безвременно
		   }
	   }
			   }
        $this->model->fill($ar);
        $this->model->save();
    }

   function saveCoords(){
	 if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'update')){return false;}
	  if(is_array($this->request->coord)){
		$key =0;
		$this->model->coords()->delete();
		foreach($this->request->coord as $k=>$item){
		   $coord_name = 'по стопам золотой орды';
        if($item){
		   $key++;
	   if(isset($this->request->coord_name[$k])){
		   $coord_name = $this->request->coord_name[$k];
	   }
	   $this->model->coords()->create(['coord'=>$item,'undex_coord'=>$key,'coord_name'=>$coord_name]);
       }
	  }
	 }
	}



}