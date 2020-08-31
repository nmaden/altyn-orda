<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Modules\Entity\Model\Comuna\Comuna;

class ComunaCreateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run($univer){
        $ar = $this->request->all();
        
        if ($this->request->user())
            $ar['edited_user_id'] = $this->request->user()->id;
       
        $ar['user_id'] = $this->request->user()->id;
        $ar['tags'] = json_encode($this->request->tags);
        $ar['status_id'] = 1;
        $ar['univer_id'] = $univer->id;

        $this->model->fill($ar);
        $this->model->save();
    }

}