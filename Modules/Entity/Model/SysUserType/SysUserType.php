<?php
namespace Modules\Entity\Model\SysUserType;

use Illuminate\Database\Eloquent\Model;

class SysUserType extends Model {
    protected $table = 'sys_user_type';

    CONST ADMIN = 1;
    CONST MODERATOR = 2; 
    CONST MANAGER = 3; 
    CONST USER = 4; 

    static function getAr(){
        return static::pluck('name', 'id')->toArray();
    }
}
