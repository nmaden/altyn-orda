<?php
namespace Modules\Entity\Model\Moderator;

use Modules\Entity\ModelParent;

class Moderator extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'password', 'login','activator', 'type_id', 'name', 'position', 'photo', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;


    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new ModeratorScope);
    }
   
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
function relTrans(){
        return false;
    }
	
}