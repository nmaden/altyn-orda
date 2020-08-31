<?php
namespace Modules\Entity\Model\ContentFaq;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class ContentFaq extends ModelParent {
    protected $table = 'content_faq';
    protected $fillable = [ 'name', 'note', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\ContentFaq\TransFaq', 'el_id');
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
