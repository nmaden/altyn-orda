<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Actions\RegistrationAction;

use App\User;
use Session;
use Illuminate\Support\Facades\Validator;
use Mail;
class RegistrationController extends Controller {
	
function index (Request $request){
		
		
        $ar = array();
        $ar['title'] = trans('front_main.title.registration');
        $login_page = view('orda'.'.user.registration')->with(['ar'=>$ar])->render();
        return view('orda'.'.user.index')->with(['content'=>$login_page])->render();
		

        //return view('orda'.'.user.registration', $ar);
    }

    function save(Request $request){
		
  $validator = $this->validator($request->all());
  if ($validator->fails()) { 
       return redirect()->back()->withErrors($validator)->withInput();
    };
	
	    
	//$key = $this->activateKey($request->email);
		
		
		/*
	$host=	$request->root();
	$link = $host.'/activate/' .$key;
    $body    = 'Вы зарегестрировались на сайте '.''.'</br>'.'Вам необходимо активировать акаунт по ссылке '.'<a href="'.$link.'">'.$link.'</a>';
	$data = $request->all();
	$this->mail($data,$body);
		
		
		dd('ok');
		
		*/
		
		
        $action = new RegistrationAction(new User(), $request);
		//echo 500;exit();
        //dd($request->all());

        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', $e->getMessage());
        }
		
		

        return redirect()->route('login')->with('success', trans('front_main.message.success_registration'));
    }
	
	
	
		protected function activateKey($login){
	   	 return md5($login . "|" . uniqid(time()));
	   }
	
	
   protected function mail($data,$body){
		   $result = Mail::send('orda.email.email',['data'=>$data,'body'=>$body], function($message) use ($data) {
			   
				$mail_admin = 'm4iler.mailer@yandex.kz';
				$message->from('m4iler.mailer@yandex.kz', 'Пипин короткий');
				$message->to('2tanak@mail.ru','Mr. Admin')->subject('Царевна помпадур');
			});
			return true;
			}
	
	protected function validator(array $data)
    {
	$messages = [
'name.required' => 'Имя обязателное поле',
'family.required'=>'Фамилия обязательное поле',
'phone.required'=>'Телефон обязательное поле'

];
			
		
    //(?=.*[0-9]) - строка содержит хотя бы одно число;
    //(?=.*[!@#$%^&*]) - строка содержит хотя бы один спецсимвол;
    //(?=.*[a-z]) - строка содержит хотя бы одну латинскую букву в нижнем регистре;
    //(?=.*[A-Z]) - строка содержит хотя бы одну латинскую букву в верхнем регистре;
    //[0-9a-zA-Z!@#$%^&*]{6,} - строка состоит не менее, чем из 6 вышеупомянутых символов.

        return Validator::make($data, [
		    //'name' => 'required|string|max:255',
		    //'phone' => 'required|string|max:255|min:11',
		    //'gorod' => 'required|string|max:255',
			//'family' => 'required|string|max:255',
			//'oth' => 'required|string|max:255',

           // 'login' => 'required|string|max:255|unique:users',
		   'phone' => 'required|sometimes',
           'confirm' => 'required|sometimes',
           'family' => 'sometimes|required|string|max:255',
		   'name' => 'required|sometimes|string|max:255',
           'login' => 'required|string|max:255|unique:users|regex:/(([a-zA-Z0-9-\s]+))/u',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',
			'password' => 'required|string|min:6|confirmed|regex:/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/u',

        ],$messages);
    }


}
