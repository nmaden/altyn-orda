<?php
namespace Modules\Entity\Model\ContentQuestion;

use Modules\Entity\ModelParent;

class ContentQuestion extends ModelParent {
    protected $table = 'content_question';
    protected $fillable = [ 'name', 'email', 'title', 'propose', 'note', 'edited_user_id'];
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

}
