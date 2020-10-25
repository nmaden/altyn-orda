<?php
namespace Modules\Entity\Model\Allusers;

use Modules\Entity\ModelParent;

class Allusers extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'password', 'login','type_id', 'name', 'position', 'photo', 'edited_user_id','login','activator'];
    protected $filter_class = Filter::class; 
    use Presenter;

/*
    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new ModeratorScope);
    }
   */
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
function relTrans(){
        return false;
    }
	
}