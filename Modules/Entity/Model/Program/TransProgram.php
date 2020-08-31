<?php
namespace Modules\Entity\Model\Program;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransProgram extends ModelParent {
    protected $table = 'trans_program';
    protected $fillable = [ 'el_id', 'lang', 'name', 'note', 'discipline_note', 'proceed_note', 'edited_user_id'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'programs';
    }

    function getTransFiledsAttribute(){
       return  ['name', 'note', 'discipline_note', 'proceed_note'];
    }
    
}
