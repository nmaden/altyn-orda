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
		$this->saveLang();
	
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
      
      
        $this->model->updateOrCreate(['id'=>$this->model->id],$ar);

        //$this->model->fill($ar);
        //$this->model->save();
    }
 private function saveLang(){
	
	    //$this->model->relLang()->delete();
		/*
		 if(count($this->model->arLangId) > count($this->request->lang_id)){
		$array1 = $this->model->arLangId;
        $array2 = $this->request->lang_id;
$result = array_diff($array1, $array2);
$keys = array_keys($result);
		 		dd($result);exit();

		 		dd($keys);exit();

	 }
*/	
        //$this->model->relLang()->delete();
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