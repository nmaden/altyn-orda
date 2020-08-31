<?php 
namespace Modules\Entity\Model\StudentData;

trait Presenter {

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getCountryNameAttribute(){
        return ($this->relCountry ?  $this->relCountry->name : '');
    }

    function getDegreeNameAttribute(){
        return ($this->relDegree ?  $this->relDegree->name : '');
    }

    function getConnectEmailNameAttribute(){
        return ($this->connect_email ?  trans('main.yes') : trans('main.no'));
    }

    function getConnectPhoneNameAttribute(){
        return ($this->connect_phone ?  trans('main.yes') : trans('main.no'));
    }

    function getConnectSmsNameAttribute(){
        return ($this->connect_sms ?  trans('main.yes') : trans('main.no'));
    }

    
}

