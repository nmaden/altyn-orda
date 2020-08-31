<?php
namespace Modules\Entity\Model\TransLib;

use Modules\Entity\ModelParent;

use Modules\Entity\Traits\CheckTrans;

class TransLib extends ModelParent {
    protected $table = 'trans_lib';
    protected $fillable = [ 'table_name', 'el_id', 'lang', 'name', 'note', 'edited_user_id'];
    use CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function getTransTableNameAttribute(){
        return $this->table_name;
    }

    function getTransFiledsAttribute(){
        if ($this->table_name == 'lib_discipline')
            return ['name', 'note'];

        return  ['name'];
    }
    
}
