<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Hash;
use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Modules\Entity\Model\StudentData\StudentData;
use App\Services\UploadPhoto;

class ProfileSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){

        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->model->id;

        if (User::where('email', $this->request->email)->where('id', '<>',  $this->model->id)->count() > 0)
            throw new \Exception(trans('model.users.email_exist'));

        if ($this->request->password)
            $ar['password'] = Hash::make($this->request->password);
        else
            unset($ar['password']);
        //$ar['type_id'] = SysUserType::USER;
       
        $ar['name'] = $this->request->s_name.' '.$this->request->f_name;
       

        if ($this->request->has('photo'))
            $ar['photo'] = UploadPhoto::upload($this->request->photo);
        else 
            unset($ar['photo']);

        $this->model->fill($ar);
        $this->model->save();

        $data = StudentData::where('user_id',$this->model->id)->first();
        if (!$data){
            $data = new StudentData();
            $data->user_id = $this->model->id;
        }

        $data->fill($this->request->all());

        $data->edited_user_id = $this->model->id;
        $data->save();
    }

}