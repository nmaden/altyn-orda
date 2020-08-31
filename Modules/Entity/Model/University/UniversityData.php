<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityData extends ModelParent {
    protected $table = 'university_data';
    protected $fillable = [ 'university_id', 'web_sait', 'address_off', 'address_legal', 'coor', 'phones', 'email', 'owner_type',
                             'is_campus', 'is_library', 'is_career', 'is_clubs', 'about_text', 'student_life_text',  
                            'is_med_insurance', 'is_inter_programm', 'exchange_links'];
    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\University\TransUniversity', 'el_id');
    }

    function getAddressOffAttribute($v){
        return $this->getTransField('address_off', $v);
    }

    function getAddressLegalAttribute($v){
        return $this->getTransField('address_legal', $v);
    }

    function getAboutTextAttribute($v){
        return $this->getTransField('about_text', $v);
    }

    function getStudentLifeTextAttribute($v){
        return $this->getTransField('student_life_text', $v);
    }
}
