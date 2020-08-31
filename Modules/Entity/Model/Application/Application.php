<?php
namespace Modules\Entity\Model\Application;

use Modules\Entity\ModelParent;

class Application extends ModelParent {
    protected $table = 'application';
    protected $fillable = [ 'user_id', 'univer_id', 'manager_id', 'f_name', 's_name', 'date_b', 'country_id', 'email', 'phone', 'enter_date', 
                            'need_degree_id', 'note', 'connect_email', 'connect_phone', 'connect_sms', 'edited_user_id'];
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
    
    function relManager(){
        return $this->belongsTo('Modules\Entity\Model\Manager\Manager', 'manager_id');
    }
    
    function relUniversity(){
        return $this->belongsTo('Modules\Entity\Model\University\University', 'univer_id');
    }

}
