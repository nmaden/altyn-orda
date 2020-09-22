<?php

namespace App\Helper;
use Illuminate\Http\Request;

class Url {
  public function get($uri) {
    $locale = app()->getLocale();
    $url = str_replace("/".$_SERVER['HTTP_HOST'], "/".$_SERVER['HTTP_HOST'].'/'.$locale, $uri);
     return $url;
}
}