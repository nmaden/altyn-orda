<?php
namespace Modules\Entity\Model\ContentTextBlock;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class ContentTextBlock extends ModelParent {
    protected $table = 'content_text_block';
    protected $fillable = [ 'sys_key', 'note', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\ContentTextBlock\TransTextBlock', 'el_id');
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
