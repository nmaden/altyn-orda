<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Hash;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;
use Session;

class LoginController extends Controller {
    function index (Request $request){
		
        $ar = array();
        $ar['title'] = trans('front_main.title.enter');
        $theme = Session::get('mobilSwitch');
        return view('orda'.'.user.login', $ar);
    }

    function check(Request $request){
		
        $user = User::where(['email' => $request->input('email')])->whereIn('type_id', [SysUserType::USER,SysUserType::MODERATOR,SysUserType::MANAGER,SysUserType::ADMIN])->first();
        if (!$user){
            return back()->with('error', trans('front_main.message.wrong_access'));
		}
        if (!Hash::check($request->password, $user->password))
            return back()->with('error', trans('front_main.message.wrong_access'));

        Auth::loginUsingId($user->id, true);
        		

        return redirect()->route('admin_index'); 
    }

    function logout(Request $request){
        Auth::logout();
       if($request->lang){
         return redirect('/'.$request->lang.'/');
       }else{
         return redirect('/');
        }
       
       
        //return redirect()->back(); 

    }

}
