<?php
namespace Modules\Entity\Model\ContentPage;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class ContentPage extends ModelParent {
    protected $table = 'content_page';
    protected $fillable = [ 'sys_key', 'name', 'note', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\ContentPage\TransPage', 'el_id');
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
