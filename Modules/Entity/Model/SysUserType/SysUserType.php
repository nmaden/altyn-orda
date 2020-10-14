<?php
namespace Modules\Entity\Model\SysUserType;

use Illuminate\Database\Eloquent\Model;

class SysUserType extends Model {
    protected $table = 'sys_user_type';

    CONST ADMIN = 1;
    CONST MANAGER = 5; 
	CONST GID = 2; 
    CONST MODERATOR = 3; 
    CONST USER = 4; 
 static function getRole($role){
        $search= array_search($role,['ADMIN'=>1,'MANAGER'=>5,'GID'=>2,'MODERATOR'=>3,'USER'=>4]);
		if($search){return $search;}
		return false;
    }
    static function getAr(){
        return static::pluck('name', 'id')->toArray();
    }
}
