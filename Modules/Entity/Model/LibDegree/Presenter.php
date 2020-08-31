<?php 
namespace Modules\Entity\Model\LibDegree;

trait Presenter {

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
		
        return $this->getTransField('name', $v);
    }

}

