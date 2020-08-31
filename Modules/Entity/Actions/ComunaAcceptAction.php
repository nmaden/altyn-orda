<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Modules\Entity\Model\Comuna\Comuna;

class ComunaAcceptAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = [];
        if ($this->request->user())
            $ar['edited_user_id'] = $this->request->user()->id;
		
		switch($this->model->status_id){
			case Comuna::CREATED:{
				$ar['status_id'] = Comuna::ACCCEPTED;
             break;
			}
			case Comuna::ACCCEPTED: {
				$ar['status_id'] = Comuna::CANCELED ;
             break;
			}
			case Comuna::CANCELED: {
				$ar['status_id'] = Comuna::ACCCEPTED;
             break;
			}
		}
		
        
        
        $this->model->fill($ar);
        $this->model->save();
		return $this->model;
    }

}