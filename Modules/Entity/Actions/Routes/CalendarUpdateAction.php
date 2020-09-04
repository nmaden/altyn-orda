<?php
namespace Modules\Entity\Actions\Routes;

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
      
      
        //dd($this->model->photo);
        $this->model->fill($ar);
        $this->model->category_id = $this->request->category_id;
        $this->model->save();
    }

   function saveCoords(){
	   
	   $this->model->coords()->updateOrCreate(['routes_id' => $this->model->id],['coord_a'=>$this->request->coord_a,'coord_b'=>$this->request->coord_b,'coord_c'=>$this->request->coord_с,'coord_d'=>$this->request->coord_d]);
	   
   }



}