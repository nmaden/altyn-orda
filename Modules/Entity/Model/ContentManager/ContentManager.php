<?php
namespace Modules\Entity\Model\ContentManager;

use Modules\Entity\ModelParent;
use Modules\Entity\Model\SysUserType\SysUserType;

class ContentManager extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'login','activator','password', 'type_id', 'name', 'position', 'photo', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;
	
	const MANAGER = SysUserType::MANAGER;
	/*
    public function scopeAccepted($query){
        $query->where('status_id', static::ACCCEPTED);
    }
*/

    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new ContentManagerScope);
    }
   
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
    function relUsers(){
        return $this->hasOne('App\User', 'id','user_id');
    }
	
  function relTrans(){
        return false;
    }
	
}