<?php
namespace Modules\Entity\Model\Gid;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Entity\Model\SysUserType\SysUserType;
use Auth;
class ContentManagerScope implements Scope{
    public function apply(Builder $builder, Model $model){
				if (!Auth::guest()) {

	 $user = Auth::user()->id;
       if($user != SysUserType::ADMIN){
		   $builder->where('user_id', $user);
  
	   }
    }
	}
}