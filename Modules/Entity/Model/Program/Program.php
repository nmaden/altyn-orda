<?php
namespace Modules\Entity\Model\Program;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Program extends ModelParent {
    protected $table = 'programs';
    protected $fillable = [ 'univer_id', 'name', 'price_for_inter', 'degree_id', 'price_for_citizen', 'study_start', 'study_end', 
                            'duration_year','discipline_note', 'proceed_note', 'edited_user_id','note'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relUniversity(){
        return $this->belongsTo('Modules\Entity\Model\University\University', 'univer_id');
    }

    function relDegree(){
        return $this->belongsTo('Modules\Entity\Model\LibDegree\LibDegree', 'degree_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Program\TransProgram', 'el_id');
    }

    function relDiscipline(){
        return $this->hasMany('Modules\Entity\Model\Program\ProgramDiscipline', 'program_id','id');
    }

    function relData(){
        return $this->HasOne('Modules\Entity\Model\University\UniversityData', 'university_id', 'univer_id');
    }
    
    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
