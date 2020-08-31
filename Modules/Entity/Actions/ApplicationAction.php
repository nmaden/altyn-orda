<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Auth;
use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Modules\Entity\Model\StudentData\StudentData;

class ApplicationAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
        $this->model = $model; 
        $this->request = $request; 
    }

    function run($univer, $manager){

        $this->calcAuth();

        $this->createApplication();

        $this->modifyStudentData();


    }

    private function createApplication(){
        $ar = $this->request->all();
        $ar['user_id'] = $this->user->id;

        $this->model->fill($ar);
        $this->model->save();
    }

    private function modifyStudentData(){
        $data = StudentData::where('user_id', $this->user->id)->first();
        if (!$data){
            $data = new StudentData();
            $data->user_id = $this->user->id;
        }

        $ar = $this->request->all();
        
        $data->fill($ar);
        $data->save();
    }

    private function calcAuth(){
        $user = $this->request->user();
        if ($user){
            $this->user = $user;
            return true;
        }

        $check_user = false;
        if (!$user)
            $check_user = User::where('email', $this->request->email)->first();
        
        if ($check_user)
            throw new \Exception(trans('front_main.message.cponnect_manger_exist_email'));
        
        $password = rand(100000, 600000);

        $user = new User();
        $user->email = $this->request->email;
        $user->password = \Hash::make($password);
        $user->type_id = SysUserType::USER;
        $user->save();

        Auth::loginUsingId($user->id, true);
        
        $this->user = $user;
        return true;  
    }

}