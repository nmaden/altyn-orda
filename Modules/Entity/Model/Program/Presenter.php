<?php 
namespace Modules\Entity\Model\Program;

use Modules\Entity\Model\University\University;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibDegree\LibDegree;
use Cache;
trait Presenter {
    
    function getArDisciplineIdAttribute(){
        return $this->relDiscipline()->pluck('discipline_id')->toArray();
    }
    
    function getDisciplineAr(){
		
		if(Cache::has('discipline')){
		$cache = Cache::get('discipline');
        return $cache;
		}else{
		Cache::forever('discipline',LibDiscipline::pluck('name', 'id')->toArray());
		return LibDiscipline::pluck('name', 'id')->toArray();
		}
       
    }

    function getUniverAr(){
		if(Cache::has('univer')){
		$cache = Cache::get('univer');
        return $cache;
		}else{
		Cache::forever('univer',University::pluck('name', 'id')->toArray());
		return University::pluck('name', 'id')->toArray();
		}
       
    }

    function getDegreeAr(){
		if(Cache::has('degree')){
		$cache = Cache::get('degree');
        return $cache;
		}else{
		Cache::forever('degree',LibDegree::pluck('name', 'id')->toArray());
		return LibDegree::pluck('name', 'id')->toArray();
		}
	}

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
		
        return $this->getTransField('name', $v);
    }
 
    function getNoteAttribute($v){
	
        return $this->getTransField('note', $v);
    }
	
	/*
    function getTagAttribute($v){
	 dd($v);
        //return $this->getTransField('discipline_note', $v);
    }
	*/
	
    function getDisciplineNoteAttribute($v){
        return $this->getTransField('discipline_note', $v);
    }

    function getProceedNoteAttribute($v){
        return $this->getTransField('proceed_note', $v);
    }
    
    function getUniverNameAttribute(){
        return ($this->relUniversity ?  $this->relUniversity->name : '');
    }

}

