<?php
namespace App\Helper;

use Illuminate\Support\Facades\Request;

class CurrentLang {
	
	
	static function url(){
		$url_get = $_SERVER['REQUEST_URI'];
        $admin = strpos($url_get, "admin");
		if($admin){
			$lang = Request::get('lang');
			return $lang;
		}
		return false;
		
		
	}
	
    static function get(){
        if (session('current_lang')){
            \App::setLocale(session('current_lang'));
            return session('current_lang');
        }
        \App::setLocale('en');


        return 'en';
    }

    static function set($lang){
        if (!in_array($lang, ['ru', 'en']))
            return 'ru';

        \App::setLocale($lang);
        session(['current_lang' => $lang]);
        session()->save();

        return $lang;
    }

    static function getAr(){
        return [
            'en' => 'English', 'ru' => 'Русский'
        ];
    }
}
