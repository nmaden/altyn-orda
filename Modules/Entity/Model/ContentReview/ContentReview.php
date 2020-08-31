<?php
namespace Modules\Entity\Model\ContentReview;

use Modules\Entity\ModelParent;

class ContentReview extends ModelParent {
    protected $table = 'content_review';
    protected $fillable = [ 'fio', 'photo', 'address', 'note', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

   
}
