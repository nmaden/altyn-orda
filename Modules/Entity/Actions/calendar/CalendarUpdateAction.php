<?php
namespace Modules\Entity\Actions\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
class CalendarUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
<<<<<<< HEAD
		//$this->saveApplication();
=======
		//dd($this->request->all());exit();
		$this->saveCoords();
>>>>>>> 2a66976... 31.08.2020
        //$this->saveRequirement();
    }

    private function saveMain(){
	
        $ar = $this->request->all();
<<<<<<< HEAD
		
        $ar['user_id'] = $this->request->user()->id;
    
	 	if ($this->request->has('photo')){
			
			
		   
		    if(is_file(public_path($this->model->photo))){
=======
		$ar['user_id'] = $this->request->user()->id;
    
	 	if ($this->request->has('photo')){
			
			if(is_file(public_path($this->model->photo))){
>>>>>>> 2a66976... 31.08.2020
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

<<<<<<< HEAD
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

 
=======
   function saveCoords(){
	   
	   $this->model->coords()->updateOrCreate(['routes_id' => $this->model->id],['coord_a'=>$this->request->coord_a,'coord_b'=>$this->request->coord_b,'coord_c'=>$this->request->coord_с,'coord_d'=>$this->request->coord_d]);
	   
   }
>>>>>>> 2a66976... 31.08.2020



}