<?php
namespace Modules\Entity\Model\ContentPage;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransPage extends ModelParent {
    protected $table = 'trans_faq';
    protected $fillable = [ 'el_id', 'lang', 'name', 'note', 'edited_user_id'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'content_page';
    }

    function getTransFiledsAttribute(){
        return  ['name', 'note',];
    }

}
