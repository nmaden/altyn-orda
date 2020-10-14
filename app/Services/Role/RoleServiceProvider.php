<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:15
 */

namespace App\Services\Role;


use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind("role", 'Modules\Entity\Model\SysUserType\SysUserType');
    }
}