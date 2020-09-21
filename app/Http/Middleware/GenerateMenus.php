<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;
use Session;
class GenerateMenus {
    protected $auth;

    function __construct(Guard $auth) {
       
    }

    public function handle($request, Closure $next){
    \Menu::make('MyNavBar', function ($menu) {
        $menu->add('Home');
        $menu->add('About', 'about');
        $menu->add('Services', 'services');
        $menu->add('Contact', 'contact');
    });

   
        return $next($request);
    }
}
