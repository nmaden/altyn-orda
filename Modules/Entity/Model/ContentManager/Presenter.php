<?php 
namespace Modules\Entity\Model\ContentManager;

trait Presenter {
    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

}

