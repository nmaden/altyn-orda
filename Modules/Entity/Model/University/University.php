<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

use Modules\Entity\Model\Manager\ManagerUniver;
use Modules\Entity\Model\Manager\Manager;

class University extends ModelParent {
    protected $table = 'university';
    protected $fillable = [ 'continent_id', 'country_id', 'city_id', 'name','requirement_id', 'origin_name', 'logotip', 'rank_word', 'rank_local', 'rank_unikum', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
    
    function relContinent(){
        return $this->belongsTo('Modules\Entity\Model\LibContinent\LibContinent', 'continent_id');
    }
    
    function relCountry(){
        return $this->belongsTo('Modules\Entity\Model\LibCountry\LibCountry', 'country_id');
    }
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }

    function relCats(){
        return $this->hasOne('Modules\Entity\Model\University\UniversityCat', 'university_id');
    }
    
    function relPrograms(){
        return $this->hasMany('Modules\Entity\Model\Program\Program', 'univer_id');
    }

    function relComunas(){
        return $this->hasMany('Modules\Entity\Model\Comuna\Comuna', 'univer_id');
    }
    
    function relData(){
        return $this->HasOne('Modules\Entity\Model\University\UniversityData', 'university_id');
    }
    
    function relDiscipline(){
        //return $this->hasMany('Modules\Entity\Model\University\UniversityDiscipline', 'university_id');
		return $this->hasMany('Modules\Entity\Model\Program\ProgramDiscipline', 'univer_id','id');

    }
    
    function relDormitory(){
        return $this->HasOne('Modules\Entity\Model\University\UniversityDormitory', 'university_id');
    }
    
    function relFees(){
        return $this->hasMany('Modules\Entity\Model\University\UniversityFees', 'university_id');
    }
    
    function relLang(){
        return $this->hasMany('Modules\Entity\Model\University\UniversityLang', 'university_id');
    }
    
    function relStat(){
        return $this->HasOne('Modules\Entity\Model\University\UniversityStat', 'university_id')->withDefault( new \Modules\Entity\Model\University\UniversityStat(['university_id' => $this->id]));
    }
    
    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\University\TransUniversity', 'el_id');
    }
    
    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }

    function getManager(){
        $ar_manager_id = ManagerUniver::where('univer_id', $this->id)->pluck('manager_id');
        $manager = Manager::whereIn('id', $ar_manager_id)->first();

        return $manager;
    }
}
