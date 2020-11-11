<?php
namespace Modules\Entity\Model\Manager;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Entity\Model\SysUserType\SysUserType;

class ManagerScope implements Scope{
    public function apply(Builder $builder, Model $model){
        $builder->where('type_id', SysUserType::MANAGER);
    }
}