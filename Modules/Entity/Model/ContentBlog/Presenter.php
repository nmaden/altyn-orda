<?php 
namespace Modules\Entity\Model\ContentBlog;

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

    function getShortNoteAttribute($v){
        return $this->getTransField('short_note', $v);
    }

}

