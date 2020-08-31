<?php
namespace Modules\Entity\Actions\Main;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MainSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = $this->request->all();
        
        if ($this->request->user())
            $ar['edited_user_id'] = $this->request->user()->id;
        $this->model->fill($ar);
        $this->model->save();
    }

}