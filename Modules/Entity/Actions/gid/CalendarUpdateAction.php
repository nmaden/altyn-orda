<?php
namespace Modules\Entity\Actions\Gid;

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
		if($this->request->lang_id){$this->saveLang();}
        if($this->request->sight_id){$this->saveSights();}
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
      
        
        //$this->model->updateOrCreate(['id'=>$this->model->id],$ar);

        $this->model->fill($ar);
        $this->model->save();
    }

private function saveSights(){
  if (is_array($this->request->sight_id) && count($this->request->sight_id) > 0){
	$this->model->sights()->detach();
    foreach ($this->request->sight_id as $sight_id) {
	  $this->model->sights()->attach($sight_id);
	}
	}else{$this->model->sights()->detach();}
}
 


 private function saveLang(){
	
	    
        if (is_array($this->request->lang_id) && count($this->request->lang_id))
			{
			$this->model->langGid()->detach();
			//dd($this->request->lang_id);
            foreach ($this->request->lang_id as $lang_id) {
				$this->model->langGid()->attach($lang_id);
				}
			}else{
			$this->model->langGid()->detach();}
 }

  
}