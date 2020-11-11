<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:13
 */

namespace App\Services\Localization;
use App\Helper\CurrentLang;


class Localization
{
    public function locale() {
	
			
        $locale = request()->segment(1, '');
		$reverse = array_flip(CurrentLang::getAr());
      
        if($locale && in_array($locale, $reverse)) {
            return $locale;
        }
        
	
        return "";
    }
}