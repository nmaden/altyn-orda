<?php
namespace Modules\Entity\Actions\Coords;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Cache;
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
					$ar['coord']='';
					$ar['coord_name']='';
					$ar['metr']='';

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
          $ar['edited_user_id'] = $this->request->user()->id;
		 
	    if(isset($this->request->metr[0])){
		
			$ar['metr']= $this->request->metr[0];
		}

        //dd($this->request->all());
	    if(isset($this->request->data['coor'][0])){
			//dd($this->request->data['coor']);
			$ar['coord'] = $this->request->data['coor'];
	
			  $ar['coord_name'] = serialize($this->request->coord_name);
			

		}
		

        if($this->request->lang !='ru'){
			$ar['coord_name'] = serialize($this->request->coord_name);

		}
				

        $this->model->fill($ar);
        $this->model->save();
    
	}





}