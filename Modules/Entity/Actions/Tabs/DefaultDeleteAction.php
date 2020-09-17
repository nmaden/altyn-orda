<?php
namespace Modules\Entity\Actions\Tabs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
class DefaultDeleteAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
	
		if(is_array($this->model->photo_unserialize) && !empty($this->model->photo_unserialize)){
			foreach($this->model->photo_unserialize as $item){
				Storage::delete($item);
			}
		}
		$this->model->delete();
     }

}