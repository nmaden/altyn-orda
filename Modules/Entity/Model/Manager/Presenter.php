<?php 
namespace Modules\Entity\Model\Manager;
use Modules\Entity\Model\University\University;

trait Presenter {

    function getUniversityAr(){
        return University::pluck('name', 'id')->toArray();
    }

    function getArUniverIdAttribute(){
        return $this->relUnivers()->pluck('univer_id')->toArray();
    }

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

}

