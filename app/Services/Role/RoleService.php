<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:14
 */

namespace App\Services\Role;
use Illuminate\Support\Facades\Facade;

class RoleService extends Facade
{
    protected static function getFacadeAccessor() {
        return "role";
    }
}