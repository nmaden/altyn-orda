<?php
namespace Modules\Entity\Model\ContentMessage;

use Modules\Entity\ModelParent;

class ContentMessage extends ModelParent {
    protected $table = 'content_messages';
    protected $fillable = [ 'name', 'email', 'note', 'edited_user_id'];
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

}
