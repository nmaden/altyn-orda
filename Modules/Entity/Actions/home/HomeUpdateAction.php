<?php
namespace Modules\Entity\Actions\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
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
 private function saveSights(){
	 
	   //$this->model->relSights()->delete();
	   
	   //$result = array_intersect($this->request->sight_id, $this->model->arsights); 

        if (is_array($this->request->sight_id) && count($this->request->sight_id)){
			$this->model->sights()->detach();
            foreach ($this->request->sight_id as $sight_id) {
				
				
				$this->model->sights()->attach($sight_id);
				
				
				}
				
        }else{
			$this->model->sights()->detach();

		}
		
    }
 

  

 



}