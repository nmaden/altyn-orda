<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Actions\RegistrationAction;

use App\User;
use Session;
use Illuminate\Support\Facades\Validator;
use Lang;
use Carbon\Carbon;

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
	
	

    $action = new RegistrationAction(new User(), $request);
	try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', $e->getMessage());
        }
		
	

        return redirect()->route('login')->with('success', trans('messages.success_registration'));
    }
	
	
	   public function activate($hash){
		
   	   $hash = strip_tags($hash);
	   $user = User::where('activate_key', '=', $hash)->first();
	   $user->activator;
	   $created_at= $user->created_at;
	   $time_created_at= strtotime($created_at);//когда создали в секундах
	   $date = Carbon::now()->timestamp;//текущее время
	   $dni = 86400 *1;//секунд в одном дне
	   $time= $date-$dni;//прошло секунд
       if($time > $time_created_at){//если прошло более одного дня
		   return redirect('/login')->with('error', 'Активация просрочена');
	   }else{
		   if($user->activator == 'no_active'){
			   $user->activator='active';
			   $user->save();
			   return redirect('/login')->with('success', Lang::get('message.success_activate'));
		   }else{
			   if($user->activator == 'active'){
				   	return redirect('/login')->with('error', Lang::get('message.old_activate'));

			   }
			   return redirect('/login')->with('error', 'Извините, не удалось активировать аккаунт! Обратитесь к администратору сайта!');
		   }
	   }
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
