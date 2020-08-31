<?php 
namespace Modules\Entity\Model\ContentReview;

trait Presenter {

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }


}

