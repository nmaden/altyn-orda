<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Modules\Entity\Model\Comuna\Comuna;
use Modules\Entity\Model\ComunaMessage\ComunaMessage;

class ComunaAnswerAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run($univer, $comuna){
        $ar = $this->request->all();
        
        if ($this->request->user())
            $ar['edited_user_id'] = $this->request->user()->id;

        $ar['user_id'] = $this->request->user()->id;
        $ar['status_id'] = 1;
        $ar['comuna_id'] = $comuna->id;

        $this->model->fill($ar);
        $this->model->save();
    }

}