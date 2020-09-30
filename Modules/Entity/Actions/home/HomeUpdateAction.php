<?php
namespace Modules\Entity\Actions\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Route;
class HomeUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
		$this->saveSights();
	    $this->saveCalendars();
		$this->saveGids();

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
      
      
        //dd($this->model->photo);
        $this->model->fill($ar);
        $this->model->save();
    }
	
	
	
	
	
	private function saveGids(){
	 if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'create')){return false;}
	
    if(empty($this->request->gid_id)){
	   if(isset($this->model->gids[0])){
		    foreach ($this->model->gids as $sight_id) {
						$this->model->gids()->detach($sight_id);}
	   }
             return false;
	}

   $check= $this->model->checkUpdateBelongMany($this->request,'gids','gid_id');
   if($check){
	  	 

    foreach ($this->request->gid_id as $sight_id) {
		
		     $this->model->gids()->detach($sight_id);
		   

	}
		  $this->model->gids()->sync($this->request->gid_id);

  }
 }
 
	
	
	
	
	private function saveCalendars(){
	  if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'create')){return false;}
	  if(empty($this->request->calendar_id)){
		 if(isset($this->model->calendars[0])){

		foreach ($this->model->calendars as $sight_id) {
						$this->model->calendars()->detach($sight_id);
		 }}return false;
		}

   $check= $this->model->checkUpdateBelongMany($this->request,'calendars','calendar_id');
   if($check){
	   foreach ($this->request->calendar_id as $sight_id) {
		   $arr[]= $sight_id;
        }
		  $this->model->calendars()->sync($this->request->calendar_id);

  }
 }
 
	
	
 private function saveSights(){
	 
	 if($this->request->lang != 'ru' && strpos(Route::currentRouteName(),'create')){return false;}
	
    if(empty($this->request->sight_id)){
	   if(isset($this->model->sights[0])){
		    foreach ($this->model->sights as $sight_id) {
						$this->model->sights()->detach($sight_id);}
	   }
             return false;
	}

   $check= $this->model->checkUpdateBelongMany($this->request,'sights','sight_id');
   if($check){
	  
    foreach ($this->request->sight_id as $sight_id) {
		
		     $this->model->sights()->detach($sight_id);
		   $arr[]= $sight_id;

	}
		  $this->model->sights()->sync($this->request->sight_id);

  }
 }
 

  

 



}