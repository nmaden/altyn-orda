<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;

class BlogSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->request->user()->id;

        if ($this->request->has('photo'))
            $ar['photo'] = UploadPhoto::upload($this->request->photo);
        else 
            unset($ar['photo']);

        $this->model->fill($ar);
        $this->model->save();
    }

}