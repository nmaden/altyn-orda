<?php
namespace Modules\Entity\Model\ContentBlog;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class ContentBlog extends ModelParent {
    protected $table = 'content_blog';
    protected $fillable = [ 'name', 'news_date', 'note', 'short_note', 'edited_user_id', 'photo'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\ContentBlog\TransBlog', 'el_id');
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
