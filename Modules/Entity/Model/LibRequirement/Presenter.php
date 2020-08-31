<?php 
namespace Modules\Entity\Model\LibRequirement;

trait Presenter {

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
        return $this->getTransField('name', $v);
    }

    function getNoteAttribute($v){
        return $this->getTransField('note', $v);
    }

}

