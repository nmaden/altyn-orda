<?php
namespace Modules\Entity\Model\Gid\Users;

use Modules\Entity\ModelParent;

class GidUsers extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'password', 'type_id', 'name', 'position', 'photo', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;


    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new GidUsersScope);
    }
   
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
    function relTrans(){return false;}
	
	 function relGids(){
        return $this->hasOne('App\User', 'user_id','id');
    }
	
	
}