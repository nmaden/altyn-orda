<?php
namespace Modules\Entity\Actions\Tabs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
class DefaultUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
	
    }

    private function saveMain(){
	
        $ar = $this->request->all();
		$ar['user_id'] = $this->request->user()->id;
        $ar['edited_user_id'] = $this->request->user()->id;

	    if($this->request->description){
		preg_match_all('/\/store\/editor\/[\d]+\/[\d]+\/[\d+]+\/[\d\w]+.[\w]+/i',$this->request->description,$array2);
		if(is_array($this->model->photo_unserialize)){
			$baza = $this->model->photo_unserialize;
			$diff = array_diff($baza,$array2[0]);
			$intersect = array_intersect($baza,$array2[0]);
            if(is_array($diff) && !empty($diff)){
			 foreach($diff as $item){
			   Storage::delete($item);
              }
			 }
			if(!empty($intersect)){
				$ar['photo'] = serialize($intersect);
			}
		  }else{
			  if(!empty($array2)){
			  $ar['photo'] = serialize($array2[0]);
			  }
		  }
	    }

		
        //$this->model->updateOrCreate(['id'=>$this->model->id],$ar);
        $this->model->fill($ar);
        $this->model->save();
    }

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

     private function saveInforms(){
        $this->model->relInforms->updateOrCreate(['gid_id' => $this->model->id], $this->request->data);
    }



}