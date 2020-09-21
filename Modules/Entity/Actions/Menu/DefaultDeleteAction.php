<?php
namespace Modules\Entity\Actions\Defaults;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DefaultDeleteAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
	
		//$this->model->relApplication()->delete();
		$this->model->delete();
     }

}