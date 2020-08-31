<?php
namespace Modules\Entity\Model\Comuna;

use Modules\Entity\ModelParent;

class Comuna extends ModelParent {
    protected $table = 'comuna';
    protected $fillable = [ 'user_id', 'univer_id', 'program_id', 'name', 'note', 'tags', 'status_id', 'edited_user_id'];
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

    static function getTagAr(){
        return [
            'about' => trans('model.comuna.about_tag'),
            'student_life' => trans('model.comuna.student_life_tag'),
            'program' => trans('model.comuna.program_tag'), 
            'discipline' => trans('model.comuna.discipline_tag'), 
            'how_entered' => trans('model.comuna.how_entered_tag'), 
        ];
    }
    
    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    function relUniversity(){
        return $this->belongsTo('Modules\Entity\Model\University\University', 'univer_id');
    }
    
    function relProgram(){
        return $this->belongsTo('Modules\Entity\Model\Program\Program', 'program_id');
    }

    function relMessages(){
        return $this->hasMany('Modules\Entity\Model\ComunaMessage\ComunaMessage', 'comuna_id');
    }

}
