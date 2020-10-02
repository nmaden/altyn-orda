<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Actions\RegistrationAction;

use App\User;
use Session;

class RegistrationController extends Controller {
	
	
	
	
	
    function index (Request $request){
		
		
        $ar = array();
        $ar['title'] = trans('front_main.title.registration');
        $theme = Session::get('mobilSwitch');

        return view('orda'.'.user.registration', $ar);
    }

    function save(Request $request){
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

}
