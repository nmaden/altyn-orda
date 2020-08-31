<?php
namespace Modules\Entity\Model\ContentFaq;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransFaq extends ModelParent {
    protected $table = 'trans_faq';
    protected $fillable = [ 'el_id', 'lang', 'name', 'note', 'edited_user_id'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'content_faq';
    }

    function getTransFiledsAttribute(){
        return  ['name', 'note',];
    }
}
