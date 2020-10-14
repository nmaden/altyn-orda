<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Actions\RegistrationAction;

use App\User;
use Session;
use Illuminate\Support\Facades\Validator;

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
		//dd($request->all());
		//echo 500;exit();
        //dd($request->all());

        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', $e->getMessage());
        }
		
		

        return redirect()->route('login')->with('success', trans('front_main.message.success_registration'));
    }
	
	protected function validator(array $data)
    {
        return Validator::make($data, [
		    //'name' => 'required|string|max:255',
		    //'phone' => 'required|string|max:255|min:11',
		    //'gorod' => 'required|string|max:255',
			//'family' => 'required|string|max:255',
			//'oth' => 'required|string|max:255',

           // 'login' => 'required|string|max:255|unique:users',
		    'login' => 'required|string|max:255|unique:users|regex:/(([a-zA-Z0-9-\s]+))/u',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


}
