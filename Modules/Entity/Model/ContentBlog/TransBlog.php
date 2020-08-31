<?php
namespace Modules\Entity\Model\ContentBlog;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransBlog extends ModelParent {
    protected $table = 'trans_blog';
    protected $fillable = [ 'el_id', 'lang', 'name', 'short_note', 'note', 'edited_user_id'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'content_blog';
    }

    function getTransFiledsAttribute(){
        return  ['name', 'short_note', 'note',];
    }

}
