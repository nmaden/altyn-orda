<?php
namespace Modules\Entity\Model\Gid\Users;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Entity\Model\SysUserType\SysUserType;
use Illuminate\Support\Facades\Request;

use Auth;
use RoleService;

class GidUsersScope implements Scope{
    public function apply(Builder $builder, Model $model){

	if (!Auth::guest()) {

	 $user = Auth::user()->id;
     

		   $url_get = Request::url();
        $admin = strpos($url_get, "admin");
		if($admin){
		
		   $builder->whereIn('type_id', [SysUserType::GID,SysUserType::TYROPERATOR]);
		}
	   
    }
	}
	
	
	
	
	
	
}