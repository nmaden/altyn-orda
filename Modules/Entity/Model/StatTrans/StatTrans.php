<?php
namespace Modules\Entity\Model\StatTrans;

use Modules\Entity\ModelParent;

class StatTrans extends ModelParent {
    protected $table = 'stat_trans';
    protected $fillable = [ 'table_name', 'el_id', 'lang', 'is_fill', 'is_half_fill'];

    
}
