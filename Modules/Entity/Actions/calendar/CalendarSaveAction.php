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
		
		//$this->saveApplication();
        //$this->saveRequirement();
    }

    private function saveMain(){
		
        $ar = $this->request->all();
       
        $ar['user_id'] = $this->request->user()->id;

       if ($this->request->has('photo')){
		   /*
		   if(!is_dir($dir)) {
             mkdir($dir, 0777, true);
             }
			 */
			
            $ar['photo'] = UploadPhoto::upload($this->request->photo);
	   }
        else {
            unset($ar['photo']);
        }
        
        if(isset($this->model->category_id)){
        $this->model->category_id = $this->model->category_id;
	    }
        $this->model->fill($ar);

        $this->model->save();
    }
    private function saveInforms(){
        $this->model->relInforms->updateOrCreate(['gid_id' => $this->model->id], $this->request->data);
    }

   private function saveApplication(){
        if (!method_exists($this->model, 'relApplication'))
            return true;
		
		$this->model->relApplication()->create(['date' => $this->request->date,'description' => $this->request->description]);
		
        }


 



}