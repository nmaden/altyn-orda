<?php
namespace Modules\Entity\Actions\Routes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
class CalendarSaveAction {
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
    
	 	if ($this->request->has('photo')){
			
			if(is_file(public_path($this->model->photo))){
	          Storage::delete($this->model->photo);
            }
            $ar['photo'] = UploadPhoto::upload($this->request->photo,$this->model->photo);
	   }
        else {
            unset($ar['photo']);
		}
      
      
        
        $this->model->fill($ar);
		if(isset($this->model->category_id)){
        $this->model->category_id = $this->request->category_id;
		}
        $this->model->save();
    }

   function saveCoords(){
	   
	   if(is_array($this->request->coord)){
		   //dd($this->request->all());

		   $key =0;
		   $this->model->coords()->delete();
		  
		  foreach($this->request->coord as $k=>$item){
		   $coord_name = 'по стопам золотой орды';

	   if($item){
		   $key++;
	   /*--
	   $this->model->coords()->updateOrCreate(
	   ['routes_id' => $this->model->id,'coord'=>$item,''],
	   ['coord'=>$item,'undex_coord'=>$key]);
	   ----*/
	   if(isset($this->request->coord_name[$k])){
		   
		   $coord_name = $this->request->coord_name[$k];
	   }
	   $this->model->coords()->create(['coord'=>$item,'undex_coord'=>$key,'coord_name'=>$coord_name]);

	   
	   
	   
	   }
	   
		   }
	   }
	   
   }



}