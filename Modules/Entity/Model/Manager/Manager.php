<?php
namespace Modules\Entity\Model\Manager;

use Modules\Entity\ModelParent;

class Manager extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'password', 'type_id', 'name', 'position', 'photo', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;

    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new ManagerScope);
    }
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relUnivers(){
        return $this->hasMany('Modules\Entity\Model\Manager\ManagerUniver', 'manager_id');
    }

}