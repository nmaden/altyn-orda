<?php
namespace Modules\Entity\Model\ComunaMessage;

use Modules\Entity\ModelParent;

class ComunaMessage extends ModelParent {
    protected $table = 'comuna_messages';
    protected $fillable = [ 'user_id', 'comuna_id', 'note', 'status_id', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;

    CONST CREATED = 1;
    CONST ACCCEPTED = 2;
    CONST CANCELED = 3;

    public function scopeAccepted($query){
        $query->where('status_id', static::ACCCEPTED);
    }

    static function getStatusAr(){
        return [
            static::CREATED => trans('model.comuna.created_status'),
            static::ACCCEPTED => trans('model.comuna.accepted_status'),
            static::CANCELED => trans('model.comuna.canceled_status')
        ];
    }
    
    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    function relComuna(){
        return $this->belongsTo('Modules\Entity\Model\Comuna\Comuna', 'comuna_id');
    }
    
}
