<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;
use Session;
class AdminAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        //\App\Helper\CurrentLang::set('ru');

        if ($this->auth->guest() || !in_array($this->auth->user()->type_id, [SysUserType::ADMIN, SysUserType::GID,SysUserType::MANAGER,SysUserType::MODERATOR,SysUserType::TYROPERATOR])){
            Auth::logout();
            return redirect()->route('login')->with('error', 'Введите email и пароль, для доступа в кабинет');
        }
	
        return $next($request);
    }
}
