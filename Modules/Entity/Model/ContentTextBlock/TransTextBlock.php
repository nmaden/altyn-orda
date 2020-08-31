<?php
namespace Modules\Entity\Model\ContentTextBlock;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransTextBlock extends ModelParent {
    protected $table = 'trans_text_block';
    protected $fillable = [ 'el_id', 'lang', 'note', 'edited_user_id'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'content_text_block';
    }

    function getTransFiledsAttribute(){
        return  ['note'];
    }

}
