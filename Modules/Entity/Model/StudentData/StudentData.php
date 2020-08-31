<?php
namespace Modules\Entity\Model\StudentData;

use Modules\Entity\ModelParent;

class StudentData extends ModelParent {
    protected $table = 'student_data';
    protected $fillable = [ 'user_id', 'f_name', 's_name', 'date_b', 'country_id', 'email', 'phone', 'enter_date', 
                            'need_degree_id', 'note', 'connect_email', 'connect_phone', 'connect_sms', 'edited_user_id','country_code'];
    protected $filter_class = Filter::class; 
    use Presenter;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relCountry(){
        return $this->belongsTo('Modules\Entity\Model\LibCountry\LibCountry', 'country_id');
    }

    function relDegree(){
        return $this->belongsTo('Modules\Entity\Model\LibDegree\LibDegree', 'need_degree_id');
    }

}
