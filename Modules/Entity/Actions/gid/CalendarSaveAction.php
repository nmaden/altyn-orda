<?php
namespace Modules\Entity\Actions\Gid;

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
		$this->saveLang();
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
        else 
            unset($ar['photo']);
        $this->model->fill($ar);
        $this->model->save();
    }
  private function saveLang(){
	  
	  
        $this->model->relLang()->delete();
        if (is_array($this->request->lang_id) && count($this->request->lang_id)){
            foreach ($this->request->lang_id as $lang_id) {
                $this->model->relLang()->create(['lang_id' => $lang_id]);
            }
        }
    }
   private function saveApplication(){
        if (!method_exists($this->model, 'relApplication'))
            return true;
		
		$this->model->relApplication()->create(['date' => $this->request->date,'description' => $this->request->description]);
		
        }

    private function saveRequirement(){
        if (!method_exists($this->model, 'relRequirement'))
            return true;
		
		$this->model->relRequirement()->create(['text' => $this->request->text]);
        
      }

 



}