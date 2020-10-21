<?php 
namespace Modules\Entity\Model\Gid\Users;

trait Presenter {
    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

}

