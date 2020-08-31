<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityDormitory extends ModelParent {
    protected $table = 'university_dormitory';
    protected $fillable = [ 'university_id', 'cost_min', 'cost_max', 'note'];

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\University\TransUniversity', 'el_id');
    }

    function getNoteAttribute($v){
        return $this->getTransField('note', $v);
    }

    
   
}
