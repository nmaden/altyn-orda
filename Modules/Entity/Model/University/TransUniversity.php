<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class TransUniversity extends ModelParent {
    protected $table = 'trans_university';
    protected $fillable = [ 'el_id', 'data_id', 'lang', 'name', 'address_off', 'address_legal', 'note', 'edited_user_id', 'about_text', 'student_life_text'];
    use CheckTrans;

    function getTransTableNameAttribute(){
        return 'university';
    }

    function getTransFiledsAttribute(){
        return  ['name', 'address_off', 'address_legal', 'about_text', 'student_life_text'];
    }
    
}