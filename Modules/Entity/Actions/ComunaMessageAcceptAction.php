<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Modules\Entity\Model\ComunaMessage\ComunaMessage;

class ComunaMessageAcceptAction {
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

        $ar['status_id'] = ComunaMessage::ACCCEPTED;
        
		switch($this->model->status_id){
			case ComunaMessage::CREATED:{
				$ar['status_id'] = ComunaMessage::ACCCEPTED;
             break;
			}
			case ComunaMessage::ACCCEPTED: {
				$ar['status_id'] = ComunaMessage::CANCELED ;
             break;
			}
			case ComunaMessage::CANCELED: {
				$ar['status_id'] = ComunaMessage::ACCCEPTED;
             break;
			}
		}
		
		$this->model->fill($ar);
        $this->model->save();
		return $this->model;
    }

}