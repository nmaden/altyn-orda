<?php
namespace App\Helper;

use Illuminate\Support\Facades\Request;
use Session;
class CurrentLang {
	static function url(){
		$url_get = $_SERVER['REQUEST_URI'];
        $admin = strpos($url_get, "admin");
		if($admin){
		 $lang = Request::get('lang');
		 
		 if($lang){
			return $lang;
		}else{
			return 'ru';
		}
		}
		return session('current_lang');
		
		
		
	}
	
	/*
	static function url(){
		$url_get = $_SERVER['REQUEST_URI'];
        $admin = strpos($url_get, "admin");
		if($admin){
			$lang = Request::get('lang');
			return $lang;
		}
		return false;
		
		
	}
	*/
    static function get(){

        if (session('current_lang')){
          return session('current_lang');
        }
      if(!empty(app()->getLocale())){
         return app()->getLocale();
      }
       
      return 'ru';
    }

    static function set($lang){
		
        if (!in_array($lang, array_flip(self::getAr())))
            return 'ru';

        \App::setLocale($lang);
        session(['current_lang' => $lang]);
        session()->save();

        return $lang;
    }

    static function getAr(){
        return [
            'en' => 'English', 
			'ru' => 'Русский',
			'kz' => 'Казахский', 
			'fr' => 'Франсузкий',
			'de' => 'Германский',
        ];
    }
}




















































































































































































































































































































































































































































































































