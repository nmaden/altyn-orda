<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Services\UploadPhoto;
use Hash;
use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;

class ContentManagerAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->request->user()->id;

        if (User::where('email', $this->request->email)->where('id', '<>',  $this->model->id)->count() > 0)
            throw new \Exception(trans('model.users.email_exist'));

        
        if (!$this->request->password && !$this->model->password)
            throw new \Exception(trans('model.users.need_password'));
        
        if ($this->request->has('photo'))
            $ar['photo'] = UploadPhoto::upload($this->request->photo);
        else 
            unset($ar['photo']);

        if ($this->request->password)
            $ar['password'] = Hash::make($this->request->password);
        else
            unset($ar['password']);

        $ar['type_id'] = SysUserType::MODERATOR;

        $this->model->fill($ar);
        $this->model->save();


    }

}