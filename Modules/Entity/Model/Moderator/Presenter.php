<?php 
namespace Modules\Entity\Model\Moderator;

trait Presenter {
    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

}

