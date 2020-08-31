<?php
namespace Modules\Entity\Model\ContentContact;

use Modules\Entity\ModelParent;

class ContentContact extends ModelParent {
    protected $table = 'content_contacts';
    protected $fillable = [ 'photo', 'name', 'position', 'mobile', 'email', 'edited_user_id'];
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

}
