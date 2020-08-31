<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Hash;
use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Modules\Entity\Model\StudentData\StudentData;

class RegistrationAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $ar = $this->request->all();
        $ar['edited_user_id'] = 1;

        if (User::where('email', $this->request->email)->where('id', '<>',  $this->model->id)->count() > 0){
			echo 'Ошибка email';exit();
            throw new \Exception(trans('model.users.email_exist'));
		}
        
        if (!$this->request->password && !$this->model->password){
			echo 'password';exit();

            throw new \Exception(trans('model.users.need_password'));
		}

        if ($this->request->password){
						

            $ar['password'] = Hash::make($this->request->password);
		}
        else{
            unset($ar['password']);
		}


        $ar['type_id'] = 1;
//dd($ar);
        $this->model->fill($ar);
        $this->model->save();

        
    }

}