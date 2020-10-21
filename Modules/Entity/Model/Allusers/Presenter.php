<?php 
namespace Modules\Entity\Model\Allusers;

trait Presenter {
    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

}

