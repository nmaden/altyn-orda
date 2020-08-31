<?php 
namespace Modules\Entity\Model\ComunaMessage;

trait Presenter {

    function getUserNameAttribute(){
        return ($this->relUser ?  $this->relUser->name : '');
    }

    function getStatusNameAttribute(){
        $ar = static::getStatusAr();
        return (isset($ar[$this->status_id]) ?  $ar[$this->status_id] : '');
    }
    
    
}

