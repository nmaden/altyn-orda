<?php
namespace Modules\Entity\Model\ContentManager;

use Modules\Entity\ModelParent;

class ContentManager extends ModelParent {
    protected $table = 'users';
    protected $fillable = [ 'email', 'password', 'type_id', 'name', 'position', 'photo', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;

    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new ContentManagerScope);
    }
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

}