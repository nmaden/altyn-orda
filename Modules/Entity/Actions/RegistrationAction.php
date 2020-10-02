<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Hash;
use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Modules\Entity\Model\Gid\Gid;
use Lang;

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
	

/*
	$data = $request->all();

    $validator = $this->validator($request->all());
    if ($validator->fails()) { 
		       return \Response::json(['content'=>$validator->errors()]);exit();


	   //return redirect()->route('register')->withErrors($validator)->withInput();
    };
	
	    $body    = 'Вы зарегестрировались на сайте '.Lang::get('messages.online').Lang::get('messages.sitename').'</br>'.'Вам необходимо активировать акаунт по ссылке '.'<a href="'.$link.'">'.$link.'</a>';

	$key = $this->activateKey($data['email']);
		$user = $this->create($data,$key);
    $this->mail($data,$body);


*/	


   

/*
        if (User::where('email', $this->request->email)->where('id', '<>',  $this->model->id)->count() > 0){
			throw new \Exception(Lang::get('model.users.email_exist'));
		}
		        if (!$this->request->password && !$this->model->password){
			throw new \Exception(Lang::get('model.users.need_password'));
		}

*/

        if ($this->request->password){
						

            $ar['password'] = Hash::make($this->request->password);
		}
        else{
            unset($ar['password']);
		}


        $ar['type_id'] = 2;
        $this->model->fill($ar);
        $this->model->save();

        $data = new Gid();
        $data->user_id = $this->model->id;
        //$data->edited_user_id = 2;
        $data->save();
		
        
    }
	
	
	protected function create(array $data,$key)
    {
        return User::create([
		    'name' => $data['name'],
            //'login' => $data['login'],
            'email' => $data['email'],
			'gorod' => $data['gorod'],
			'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
			'activate_key'=>$key,
			// New fields
			'last_name' => $data['family'] ? $data['family'] : null,
			'patronymic' => $data['oth'] ? $data['oth'] : null,
			'lang' => $data['lang'] ? $data['lang'] : null,
			'class_id' => $data['class_id'] ? $data['class_id'] : null,
			'smena_id' => $data['smena_id'] ? $data['smena_id'] : null,
        ]);
    }
	
	
	protected function mail($data,$body){
	$result = Mail::send('site.email',['data'=>$data,'body'=>$body], function($message) use ($data) {
	  $mail_admin = env('MAIL_ADMIN');
	  $message->from($mail_admin, Lang::get('messages.online'));
	  $message->to($data['email'],'Mr. Admin')->subject(Lang::get('messages.activate').Lang::get('messages.sitename'));
	});
	return true;
	}
	   
	
	protected function activateKey($login){
	   	 return md5($login . "|" . uniqid(time()));
	   }
	   


}