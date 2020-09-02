<?php
namespace Modules\Entity\Actions\Calendar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;

class CalendarSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
		$this->saveCoors();
		//$this->saveApplication();
        //$this->saveRequirement();
    }

    private function saveMain(){
		
        $ar = $this->request->all();
		
        $ar['user_id'] = $this->request->user()->id;

       if ($this->request->has('photo')){
		 
			
            $ar['photo'] = UploadPhoto::upload($this->request->photo);
	   }
        else {
            unset($ar['photo']);
		}
		
        $this->model->fill($ar);
        $this->model->save();
    }

  
  function saveCoords(){
	   
	   $this->model->coords()->updateOrCreate(['routes_id' => $this->model->id],['coord_a'=>$this->request->coord_a,'coord_b'=>$this->request->coord_b,'coord_c'=>$this->request->coord_с,'coord_d'=>$this->request->coord_d]);
	   
   }


 



}