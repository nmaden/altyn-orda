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
	  
	  
              
        if (is_array($this->request->lang_id) && count($this->request->lang_id))
			{
			$this->model->langGid()->detach();

            foreach ($this->request->lang_id as $lang_id) {
				$this->model->langGid()->attach($lang_id);
				}
			}else{
			$this->model->langGid()->detach();}
 }

    
 



}