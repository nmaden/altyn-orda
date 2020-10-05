<?php
namespace Modules\Entity\Actions\Defaults;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Cache;
class DefaultUpdateAction {
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
          $ar['edited_user_id'] = $this->request->user()->id;

	     if($this->request->seo_description && $this->request->seo_title){
		   if($this->request->lang){
			 
			 Cache::forever('seo-figure-'.$this->request->lang,[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно

		   }else{
			   
		     Cache::forever('seo-figure-ru',[$this->request->seo_title,$this->request->seo_description]);//сохранение безвременно
		   }
	   }
	   
        $this->model->fill($ar);
        $this->model->save();
    }

   private function saveApplication(){
        if (!method_exists($this->model, 'relApplication'))
            return true;
		
		
		$this->model->relApplication->update(['date' => $this->request->date,'description' => $this->request->description]);
		
        }

    private function saveRequirement(){
        if (!method_exists($this->model, 'relRequirement'))
            return true;
		
		$this->model->relRequirement()->create(['text' => $this->request->text]);
        
      }

     private function saveInforms(){
        $this->model->relInforms->updateOrCreate(['gid_id' => $this->model->id], $this->request->data);
    }



}